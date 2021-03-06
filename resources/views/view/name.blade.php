<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <h2 class="text-info text-center">{{$post->name}} sent message about {{$post->subject}}</h2>
        <div>
            <p class="text-dark font-italic">{{$post->body}}</p>
            Email: {{$post->email}}
        </div>
    </div>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>