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
        <h3 style="display:inline-block; text-align: center;">{{$info[0]->routeID}}</h3>
        <h3 style="float:right; width:15%; text-align:center; background-color:#AFBBFC; cursor:pointer">
            <a href="{{ url()->previous() }}" style="color:#FFFFFF">Back</a>
        </h3>
        <div class="subcontainer" style="margin:0px; padding:20px; display: block; text-align: center">
            <h4 class="left">Vhire No. (Code No.)</h4>
            <input type="text" className="right" placeholder="{{$info[0]->vehicleID}} / {{$info[0]->PlateNum}}" readOnly></input>
            <h4 class="left">Terminal</h4>
            <input type="text" class="right" placeholder="{{$info[0]->terminalID}} / <?php echo $info[0]->{'Location Name'};?>" readOnly></input>
            <h4 class="left">Time</h4>
            <input type="text" class="right" placeholder="{{$info[0]->ETD}} - {{$info[0]->ETA}}" readOnly></input>
            <h4 class="left">Quantity</h4>
            <input type="number" class="right" placeholder="1" id="amt"></input>
            <h4 class="left">Fare Price</h4>
            <input type="text" class="right" placeholder="PHP {{$info[0]->Fare}}.00" readOnly></input>
            <h4 class="left">Total Amount</h4>
            <input type="text" class="right" placeholder="PHP 1.00" id="total" readOnly></input>
            <form action="BookingAction" name=""/>
                <input type="hidden" name="tripID" value="{{$info[0]->tripID}}"/>
                <input type="hidden" name="quantity" value="0" />
                <button class="bttn" type="submit">Book Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    console.log('{{$currUser}}');
</script>
