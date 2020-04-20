@php
    $title = "Tasks";
    $css = "profile.css";
@endphp
@extends('layouts.master')
@section('content')
    <form action="/tasks/new" method="post">

        {{ csrf_field() }}
        Task Name: <input type="text" name="taskTitle" id="taskTitle"> <br>
        Description: <input type="text" name="taskDescription" id="taskDescription"><br>
        Finished? : <input type="checkbox" name="isComplete" id="isComplete"><br>

        <button type="submit">Submit</button>
    </form>
@endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js">
    
        $( "#isComplete" ).click(function() {
            if($('#isComplete').is(':checked')){
                console.log(1);
                $('#isComplete').val('1');
            } else {
                console.log(0);
                $('#isComplete').val('0');
 
            }
        });
    </script>