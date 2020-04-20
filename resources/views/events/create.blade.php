<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/event.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/ >
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
        
        <title>Event</title>

    </head>
    <body>

        <nav>
            <div class="logo">
                <a href="/home">
                    <img src="/img/Bookey-08-08.png" alt="Booky Logo" sizes="210x59">
                </a>
            </div>

            <ul>
                <li>
                    <a href="/home">Home</a>
                </li>
                <li>
                    <a class="createEvent" href="/events">Create an Event</a>
                </li>
                <li class="more">
                    <a href="#">Account</a>
                    <div class="account">
                        <a href="/account/personal-information">Personal Information</a>
                        <a href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <h1 style="margin-left: 2em;">Create an Event</h1>
        <form action="/events/new" method="post">
            {{ csrf_field() }}

                <div class="name">
                    <p>
                        Event Name:
                    </p>
                    <input type="text" name="eventName" id="eventName" maxlength="20" placeholder="What is the name of the event?" required> <span class="inputLength"></span>
                </div>
                <div class="description">
                    <p>
                        Description: 
                    </p>
                    <textarea type="textarea" name="eventDescription" id="eventDescription" placeholder="What juicy details do you have about this event?" required></textarea>
                </div>
                <div class="startDate">
                    <p>
                        Start Date:
                    </p>
                    <input class="datetimestart" type="text" name="startDate" id="startDate" readonly required>

                    <p>
                        End Date:
                    </p>
                    <input class="datetimeend" type="text" name="endDate" id="endDate" readonly required>
                </div>
                <div class="allDay">
                    <p>
                        All Day Event?:
                    </p>
                    <input type="checkbox" name="allDay" id="allDay">
                </div>
                <div class="location">
                    <p>
                        Location:
                    </p>
                        <input type="text" name="eventLocation" id="eventLocation" placeholder="Where is the event located?"  required>
                    </div>
                <div class="recipients">
                    <p>
                        Recipients (Please add a semicolon after each email):
                    </p>
                    <input type="text" name="recipients" id="recipients"placeholder="Who will the meeting be with?"  required></textarea>
                </div>
                <button type="submit">Done</button>
        </form>

       
    </body>
    
</html>

 <script>

    //  var min;

    // $("#datetimepicker").on("change paste keyup", function() {

    //     min = $(this).val();
    //     console.log(min); 
    // });
// https://github.com/xdan/datetimepicker
    jQuery('.datetimestart').datetimepicker({
        onShow:function( ct ){
        this.setOptions({
            // minDate:'-1970/01/02',//yesterday is minimum date(for today use 0 or -1970/01/01)
            minDate:'0',//today is minimum date(for yesterday use -1970/01/02)
            maxDate:jQuery('.datetimeend').val()?jQuery('.datetimeend').val():false
        });
    }});
    jQuery('.datetimeend').datetimepicker({
        onShow:function( ct ){
        this.setOptions({
            // minDate:'-1970/01/02',//yesterday is minimum date(for today use 0 or -1970/01/01)
            //today is minimum date(for yesterday use -1970/01/02)
            minDate:jQuery('.datetimestart').val()?jQuery('.datetimestart').val():false
        });
    }});
    
    // $(.eventTitle).on('change', function() {
        
    // })
    // console.log(min);
        </script>