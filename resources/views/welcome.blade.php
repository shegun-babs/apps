<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    @endif

    <div class="container">
        <ul class="list-group">
            <li>What</li>
        </ul>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
<script>
    var socket = io('http://apps.shegunbabs.app:3000');
    $(document).ready(function(){
        socket.on('test-channel:UserSignedUp', function(data){
            $('.list-group').fadeIn(1000).append("<li style='background:#c0c0c0'>" + data.username + "</li>");
        });

        socket.on('notification-channel:ContactUploadStarted', function(data){
            $('.notification').slideDown(1000).prepend("<li>" + data.msg + "</li>");
        });
    });
</script>
</body>
</html>
