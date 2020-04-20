
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/notes.css">
    <link rel="icon" href="/img/Bookey-06.png" type="image/png" sizes="16x16">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script> 
    <style>
        .account {
            display: none;
            position: absolute;
            /* margin-right: 1em; */
        }

        .account a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .more:hover .account {display: block;}

        body{
            text-align: center;
        }
        
        #noteName{
            font-size: 50px;
            -webkit-box-shadow: inset 0px 0px 60px -60px rgba(209,16,16,1);
            -moz-box-shadow: inset 0px 0px 60px -60px rgba(209,16,16,1);
            box-shadow: inset 0px 0px 60px -60px rgba(209,16,16,1);
        }    
        
        #noteText{
            -webkit-box-shadow: 7px 8px 9px -4px rgba(204,204,204,1);
            -moz-box-shadow: 7px 8px 9px -4px rgba(204,204,204,1);
            box-shadow: 7px 8px 9px -4px rgba(204,204,204,1);
        }

        textarea {
            width: 80vw;
            height: 50vh;
        }

        form{
            margin: 50px auto;
            display: inline-grid;
        }

        button{
            text-decoration: none;
            background-color: blue;
            border: none;
            padding: 1em;
            width: 40%;
            margin: 2em 0;
        }
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

    <form action="/notes/new" method="post">
        {{ csrf_field() }}

       <input type="text" name="noteName" id="noteName" placeholder="Note Name" required>
       <br>
      <textarea type="textarea" name="noteText" id="noteText" placeholder="Write Something..." required></textarea>
       <br>
       <br>
       <span class="colors" style="margin-left:-2.7em">
            <div class="yellow">
                <input type="radio" id="radioYellow" name="radioCol" value="#dddd63" required >
                <label for="radioYellow" >Yellow</label>
            </div>

            <div class="red">
                <input type="radio" id="radioRed" name="radioCol" value="#f06363"required>
                <label for="radioRed">Red</label>
            </div>

            <div class="brown">
                <input type="radio" id="radioPurple" name="radioCol" value="#675cc8"required>
                <label for="radioPurple">Purple</label>
            </div>

            <input type="hidden" id="selected" name="selected" value="">
        </span>
        <br>
      <button type="submit">Save Note</button>

       {{-- <div id="editor">
             <p>This is some sample content.</p>
       </div> --}}


    </form>
</body>
</html>
<script>
    var selected = $('#selected');
    $('.colors input').on('change', function() {
        selected.val($('input[name=radioCol]:checked', '.colors').val());
        console.log(selected.val());
    });


//     ClassicEditor.create(document.querySelector('#editor'))
//         .catch( error => {
//             console.error( error );
//         } );


// $('#editore.ck-file-dialog-button').css("visibility", "hidden");
</script>

