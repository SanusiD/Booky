@php
    $title = "Home";
    $css = "home.css";
@endphp
@extends('layouts.master')
@section('content')
    <div class="container">
    <div class="splash">
        <h1 class="name">Good <span class="timeofday">  </span>
            <br>
            {{Auth::User()->firstname}}!
        </h1>
        <h2 class="cta">
            What would you like to do today?
        </h2>
    </div>
    
    <h3 class="notes">
        <a href="/notes">Write your thoughts</a> 
    </h3>
    <h3 class="event">
        <a href="/events">Create an event</a> 
    </h3>
    <h3 class="tasks">
        <a href="/todo">To-do List</a>
    </h3>
    
    <h3 class="weather">
    </h3>
    <h3 class="time">
        8:35 am
    </h3>
    <h3 class="day">
    </h3>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script>
    var dayName = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][new Date().getDay()];
    var month = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"][new Date().getMonth()];

    var d = new Date()
    var day = d.getDate();
    var year = d.getFullYear();
    var curHr = d.getHours();
    var mins = d.getMinutes();
    var message;

    if (curHr < 12) {
            message = ' Morning'
        } else if (curHr < 18) {
            message = ' Afternoon'
        } else {
            message = ' Evening'
        }

    var time = moment().format('h:mm a');
    var date = moment().format('MMMM Do YYYY');
    $(".timeofday").text(message);
    $(".day").text(date);
    $(".time").text(time);

    $.getJSON('https://ipapi.co/json', function (data) {
            console.log(data);
            $city = data.city;
            $region = data.region_code;
            $con_code = data.country_code;
            console.log($city, $con_code)
            

        $.get('http://api.openweathermap.org/data/2.5/weather?q=' + $city + "," + $con_code + "&units=metric" + '&appid=c10e334cf4663ee51d41e0cc01b46c15', function (data) {
            $temp = parseInt(data.main.temp);
            // console.log($temp)
            $(".weather").html($city + ", " + $region +" "+ $temp + "&deg");
        })
            
    })
</script>
@endsection
