@extends('header')
@extends('user.sidenav')
<style>
    #routes{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container">
    @foreach ($terminal as $indivterm)
    <div class="subcontainer">
        <div>
            <h2>{{$indivterm->Location_Name}}</h2>
            <button class="btn"></button>
        </div>
        <div>
        @foreach ($route as $indivroute)
            @if($indivterm->terminalID == $indivroute->O_termID)
                <div class="routes" style="margin-right: 5px;">
                    <h3><a href="search/{{$indivroute->routeID}}">{{$indivroute->origin}} - <br>{{$indivroute->destination}}</a></h3>
                </div>
            @endif
        @endforeach   
        </div>
        <button class="btn more" style="float:right">more</button>
    </div>
    @endforeach

    <?php

        // dd($route)

    ?>
    
</div>
@endsection