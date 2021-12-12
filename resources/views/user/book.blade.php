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
        @foreach($infos as $info)
        <h3 style="display:inline-block; text-align: center;">{{$info->routeID}}</h3>
        <h3 style="float:right; width:15%; text-align:center; background-color:#AFBBFC; cursor:pointer">
            <a href="{{ url()->previous() }}" style="color:#FFFFFF">Back</a>
        </h3>
        <div class="subcontainer" style="margin:0px; padding:20px; display: block; text-align: center">
        <form action="BookingAction" name="orderForm" method="POST"/>
                @csrf
            <h4 class="left">Vhire No. (Code No.)</h4>
            <input type="text" className="right" placeholder="{{$info->vehicleID}} / {{$info->PlateNum}}" readOnly></input>
            <h4 class="left">Terminal</h4>
            <input type="text" class="right" placeholder="{{$info->terminalID}} / <?php echo $info->{'Location_Name'};?>" readOnly></input>
            <h4 class="left">Time</h4>
            <input type="text" class="right" placeholder="{{$info->ETD}} - {{$info->ETA}}" readOnly></input>
            <h4 class="left">Quantity</h4>
            <input type="number" class="right" name="quantity" placeholder="1" min="1" id="amt"></input>
            <h4 class="left">Fare Price</h4>
            <input type="text" class="right" placeholder="PHP {{$info->Fare}}.00" readOnly></input>
            <h4 class="left">Total Amount</h4>
            <input type="text" class="right" placeholder="PHP 1.00" id="total" readOnly></input>
            <input type="hidden" name="tripID" value="{{$info->tripID}}"/>
            <button class="bttn" type="submit">Book Now</button>
        </form>
        @endforeach
        </div>
    </div>
</div>
@endsection
