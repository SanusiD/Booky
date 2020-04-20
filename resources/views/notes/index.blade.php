
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/notes.css">
    <link rel="icon" href="/img/Bookey-06.png" type="image/png" sizes="16x16">
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script> 
    <style>
        .account {
            display: none;
            position: absolute;
            /* margin-right: 1em; */
            z-index: 1;
        }

        .account a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .more:hover .account {display: block;}

    </style>
    <title>Notes</title>
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

    <header>
        <h1>
            Notes
            <a href="/notes/new"><span class="newnote">+</span></a>
        </h1>
        <p>Share your thoughts</p>
    </header>
    <div class="container">
       
        @foreach ($notes as $note)
        <a href="/notes/{{$note-> noteId}}">
            <div class="note darkmode-ignore" style="background-color: {{$note->noteColor}}">
                {{-- <h1 class="id">{{$note-> noteId}}.</h1> --}}
                <h3 class="title">{{$note-> noteName}}</h3>
                <h3 class="noteDate">{{ \Carbon\Carbon::parse($note->updated_at)->toFormattedDateString()}}</h3>            
            </div>
        </a>
        @endforeach
    </div>
</body>
</html>
 
<script>
    new Darkmode().showWidget();

    var options = {
        bottom: '64px', // default: '32px'
        right: 'unset', // default: '32px'
        left: '32px', // default: 'unset'
        time: '0.5s', // default: '0.3s'
        mixColor: '#fff', // default: '#fff'
        backgroundColor: '#fff', // default: '#fff'
        buttonColorDark: '#100f2c', // default: '#100f2c'
        buttonColorLight: '#fff', // default: '#fff'
        saveInCookies: false, // default: true,
        label: '🌓', // default: ''
        autoMatchOsTheme: true // default: true
    }

    const darkmode = new Darkmode(options);
    darkmode.showWidget();
</script>

