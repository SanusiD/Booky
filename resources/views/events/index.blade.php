@php
    $title = "Events";
    $css = "event.css";
@endphp

@extends('layouts.master')
@section('content')
    <body>
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

        <div class="container">
            <div class="events">
                <h2 class="eventhead">
                    All Events
                </h2>
                <div class="calender">
                  {!! $calendar->calendar() !!}
                  {!! $calendar->script() !!}
                </div>
            </div>

            <div class="createForm">
                <h3 class="eventhead">
                    Event List
                </h3>

                    <div class="eventList">
                        @foreach ($data as $events)
                            @php
                                $input  = $events->startDate;
                                $format1 = 'Y-m-d';
                                $format2 = 'H:i';
                                $date = Carbon\Carbon::parse($input)->format($format1);
                                $time = Carbon\Carbon::parse($input)->format($format2);
                            @endphp
                            <h3 class="eventName">
                                Event Name: <span class="eventName">{{$events->eventTitle}}</span>
                            </h3>
                            <h3 class="eventDate">
                                Event Date: <span class="eventDate">{{$date}}</span>
                            </h3>
                            <h3 class="eventTime">
                                Event Start Time: <span class="eventTime">{{$time}}</span>
                            </h3>
                            <hr>
                        @endforeach
                    </div>
                
            </div>
        </div>
        
        <div class="footer">
            <h3 class="weather">
                Toronto, On 5*c
            </h3>
            <h3 class="time">
                8:35 am
            </h3>
            <h3 class="day">
                Feb 11th 2020
            </h3>
        </div>
    </body>        

    <script>
        $('.createEvent').prop('href', './events/new');
    </script>
@endsection