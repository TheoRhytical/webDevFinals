@extends('header')
@extends('user.sidenav')
<style>
    #routes{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container">
    <div class="subcontainer">
        <div>
            <h2>TERMINAL 1</h2>
            <button class="btn"></button>
        </div>

        <div>
            @foreach ($route as $indivroute)
            <div class="routes">
                <h3><a href="book">{{$indivroute->O_termID}} - {{$indivroute->D_termID}}</a></h3>
            </div>
            @endforeach
        </div>
        <button class="btn more" style="float:right">more</button>
    </div>
    <div class="subcontainer">
        <div>
            <h2>TERMINAL 2</h2>
            <button class="btn"></button>
        </div>
        <div>
        @foreach ($route as $indivroute)
            <div class="routes">
                <h3><a href="book">{{$indivroute->D_termID}} - {{$indivroute->O_termID}}</a></h3>
            </div>
            @endforeach
        </div>
        <button class="btn more" style="float:right">more</button>
    </div>
    <?php

        // dd($route)

    ?>
</div>
@endsection