@extends('header')
@extends('user.sidenav')
<style>
    #routes{
        background-color: #EFF2FF;
    }
    button{
        all: initial;
        text-align: center;
    }
</style>
@section('content')
<div class="container">
    <form action="/search" method="POST">
    @csrf
    @foreach ($terminal as $indivterm)
    <div class="subcontainer">
        <div>
            <h2>{{$indivterm->Location_Name}}</h2>
        </div>
        <div>
        @foreach ($route as $indivroute)
            @if($indivterm->terminalID == $indivroute->O_termID)
                <div class="routes" style="margin-right: 5px;">
                    <button type="submit" value="{{$indivroute->routeID}}" name="routeID"><h3>{{$indivroute->origin}} - <br>{{$indivroute->destination}}</h3></button>
                </div>
            @endif
        @endforeach  
        </div>
    </div>
    @endforeach
</form>
</div>
@endsection