@extends('header')
@extends('user.sidenav')
<style>
    #home{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container">
    <div class="subcontainer">
        <form>
            <div class="input">
                <label>From:</label> &nbsp;&nbsp;
                <select>
                        <option>Current Location</option>
                    @foreach($terminals as $term)
                        <option>{{$term->Location_Name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input">
                <label>To:</label> &nbsp;&nbsp;
                <select>
                        <option>Destination</option>
                    @foreach($terminals as $term)
                        <option>{{$term->Location_Name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input">
                <label>Time:</label> &nbsp;&nbsp;
                <select>
                        <option>Select Time</option>
                    @foreach($scheds as $sched)
                        <option>{{substr($sched->ETD,0,-3)}} - {{substr($sched->ETA,0,-3)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input" style="margin-left:30px;width:90%">
                <input type="submit" value="Search" style="background-color: #4C15E9;width:100%; color:white">
            </div>
        </form>
    </div>
    <center><h1 style="background-color: transparent; color:#4C15E9;">WELCOME, JUAN DELA CRUZ!</h1></center>
    <center><h1>Book your ride now!</h1></center>
    <center><img src="{{url('images/vhire.png')}}"></img></center>
</div>
@endsection