@php
    $css ='todo.css';
    $title ='Todo List';
@endphp

@extends('layouts.master')
@section('content')
    
<div class="container">
     <div class="top">
        <h1>
            What "To-do"
        </h1>
        <span class="new">+</span>
    </div>

    <div class="modal">
        <div class="model-content">
            <form action="/todo/new" method="post">
                {{ csrf_field() }}

                <div class="inputs">
                    <div class="task">
                        <p>Todo Name:</p>
                        <input type="text" name="todoName" class="todoName" required>
                    </div>
                </div>

                <button type="submit" class="submit">New To-do List</button>
            </form>
        </div>
    </div>


    <div class="content">
        @foreach ($todos as $todo)
            <a href="/todo/{{$todo->todoId}}"> 
                <div class="todo">
                    <h3 class="title" style="text-transform: capitalize;"> {{$todo->todoName}}</h3>
                    <h3 class="todoDate">{{ \Carbon\Carbon::parse($todo->updated_at)->diffForHumans()}}</h3>            
                </div>
            </a>
        @endforeach
    </div>
</div>

<script>
// Modal

    var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".new");
    // var closeButton = document.querySelector(".close-button");
    var submit = document.querySelector(".submit");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    // closeButton.onclick = function() {
    //     modal.style.display = "none";
    // }
    // When the user clicks on <span> (x), close the modal
    submit.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


</script>
@endsection