<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
</head>
<body>
    @foreach ($tasks as $task)

        <ul>
            <p>{{$task->taskTitle}}</p>
                <li>{{$task->taskDescription}}</li>
                <li>{{$task->isComplete}}</li>
            <br>
            <br>
        </ul>
        
    @endforeach
</body>
</html>