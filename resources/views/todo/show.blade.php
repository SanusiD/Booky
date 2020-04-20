@php
    $css ='todo.css';
    $title ='Todo List';
@endphp

@extends('layouts.master')
@section('content')
    
<div class="container">
    
    <div class="top">
        <h1>
            {{$todo->todoName}}
        </h1>
        <span class="new">+</span>
    </div>

    <div class="modal">
        <div class="model-content">
            <form action="/todo/{{$todo->todoId}}/tasks" method="post">
                {{ csrf_field() }}

                <div class="inputs">
                    <div class="task">
                        <p>Task Name:</p>
                        <input type="text" name="taskTitle" class="taskTitle" required>
                    </div>
    
                    <div class="Completed">
                        <p>Completed?</p>
                        <select name="isComplete" class="isComplete" required>
                            <option value="N">No</option>
                            <option value="Y">Yes</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit">Add Task</button>
            </form>
        </div>
    </div>

  
   
        
    <section>
    <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Completed</th>
                        <th>Date Created</th>
                        <th>Edit</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0" style="scrollbar-color: #87ceeb #ff5621;">
                <tbody>
                    @foreach ($todo->tasks as $task)
                    <tr>
                        <td>{{$task->taskTitle}}</td>
                        <td>{{$task->isComplete}}</td>
                        <td> {{ \Carbon\Carbon::parse($todo->created_at)->diffForHumans() }}</td>
                        <td><a href="edit_customer/{{$todo->todoId}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

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