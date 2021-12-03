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
            <div class="routes">
                <h3><a href="book">Origin 1 to Destination 1</a></h3>
            </div>
            <div class="routes" style="float:right">
                <h3><a href="book">Origin 2 to Destination 2</a></h3>
            </div>
            <div class="routes">
                <h3><a href="book">Origin 3 to Destination 3</a></h3>
            </div>
            <div class="routes" style="float:right">
                <h3><a href="book">Origin 4 to Destination 4</a></h3>
            </div>
            <div class="routes">
                <h3><a href="book">Origin 5 to Destination 5</a></h3>
            </div>
            <div class="routes" style="float:right">
                <h3><a href="book">Origin 6 to Destination 6</a></h3>
            </div>
        </div>
        <button class="btn more" style="float:right">more</button>
    </div>
    <div class="subcontainer">
        <div>
            <h2>TERMINAL 2</h2>
            <button class="btn"></button>
        </div>
        <div>
            <div class="routes">
                <h3><a href="book">Origin 1 to Destination 1</a></h3>
            </div>
            <div class="routes" style="float:right">
                <h3><a href="book">Origin 2 to Destination 2</a></h3>
            </div>
            <div class="routes">
                <h3><a href="book">Origin 3 to Destination 3</a></h3>
            </div>
            <div class="routes" style="float:right">
                <h3><a href="book">Origin 4 to Destination 4</a></h3>
            </div>
            <div class="routes">
                <h3><a href="book">Origin 5 to Destination 5</a></h3>
            </div>
            <div class="routes" style="float:right">
                <h3><a href="book">Origin 6 to Destination 6</a></h3>
            </div>
        </div>
        <button class="btn more" style="float:right">more</button>
    </div>
</div>
@endsection