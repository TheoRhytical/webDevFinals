@extends('header')
@extends('user.sidenav')
<style>
    #sched{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container">
    <div class="schedule">
        <h3 style="display:inline-block">Origin 1 to Destination 1</h3>
        <h3 style="float:right; width:15%; text-align:center; background-color:#AFBBFC; cursor:pointer">
            <a href="sched" style="color:#FFFFFF">Back</a>
        </h3>
        <div class="subcontainer" style="margin:0px; padding:20px; display: block; text-align: center">
            <h4 class="left">Vhire 1 (Code No.)</h4>
            <input type="text" className="right" placeholder="Vhire No. / Plate Number" readOnly></input>
            <h4 class="left">Terminal</h4>
            <input type="text" class="right" placeholder="Terminal No. / Name" readOnly></input>
            <h4 class="left">Time</h4>
            <input type="text" class="right" placeholder="ETD - ETA (Schedule)" readOnly></input>
            <h4 class="left">Quantity</h4>
            <input type="number" class="right"></input>
            <h4 class="left">Fare Price</h4>
            <input type="text" class="right" placeholder="Fare Price" readOnly></input>
            <h4 class="left">Total Amount</h4>
            <input type="text" class="right" placeholder="Fare Price x quantity of seats" readOnly></input>
            <button class="bttn">Book Now</button>
        </div>
    </div>
</div>
@endsection