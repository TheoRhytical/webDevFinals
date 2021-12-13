<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('css/sidenav.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('css/modal.css')}}" />
    <title>Vhire</title>
</head>
<body style="background-color: #4C15E9;">
<div class="header"><img src="{{url('images/logo.png')}}"></img></div>
@yield('content')
<script src="{{ asset('js/dashboard-tab.js') }}" defer></script>
<script src="{{ asset('js/open-modal.js') }}" defer></script>
<script src="{{ asset('js/filter-booking.js') }}" defer></script>
<script src="{{ asset('js/filter-sched.js') }}" defer></script>
<script src="{{ asset('js/filter-active.js') }}" defer></script>
</body>
</html>