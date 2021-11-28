@extends('header')

@section('content')
<div class="container" style="width:85%; padding:30px; text-align:center">
    <h2 style="text-align:center; color:#0F0645; font-weight:1000px">Choose User Type</h2>
    <br><br>
    <div style="position:relative">
        <a href="/"><div  class="role-cont">
        <div class="role-bg">
            <img src="{{url('images/passenger.png')}}" style="width:55%"></img>
        </div>
        <h3 class="role">Passenger</h3>
        </div></a>
        <a href="/"><div  class="role-cont">
            <div class="role-bg">
                <img src="{{url('images/driver.png')}}"></img>
            </div>
            <h3 class="role">Driver</h3>
        </div></a>
        <div class="circle">
        <img src="{{url('images/info.png')}}"></img>
        </div>
    </div>
</div>
@endsection