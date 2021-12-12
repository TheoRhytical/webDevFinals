@extends('header')
@extends('user.sidenav')
<style>
    #tic{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container" style="width:40%; float:left; margin-left:12%">
            <h1>{{ date('F d, Y', strtotime($users->Date)) }}</h1>
            <div class="subcontainer table"> 
            <table>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Vhire No</td>
                    <td>{{$users->vehicleID}}</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Terminal</td>`
                    <td><?php echo $users->{'Location_Name'}?></td>
                    
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Time</td>
                    <td>{{substr($users->ETD,0,-3)}} - {{substr($users->ETA,0,-3)}}</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Plate Number</td>
                    <td>{{$users->PlateNum}}</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Quantity</td>
                    <td>{{$users->Quantity}}</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Fare Price</td>
                    <td>{{$users->Fare}}</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Total Amount</td>
                    <td>PHP {{$users->Quantity * $users->Fare}}.00</td>
                </tr>
            </table>
                <form action="/cancel" method="POST">
                    @csrf
                    <input type="hidden" value="{{$users->tripID}}" name="tripID">
                    <input type="hidden" value="{{$users->Quantity}}" name="Quantity">
                    <center><button class="bttn" style="margin-bottom:30px; margin-top:30px" name="orderID" value="{{$users->orderID}}">Cancel</button></center>
                </form>
            </div>
        </div>
        <div class="container" style="width:21%; float:right; padding:5px">
            <center><h3>Booking Details</h3></center>
            <h1 style="margin-left:20px; margin-right:20px; text-align:center; cursor:pointer">#Order ID</h1>
            <hr></hr>
            <div class="subcontainer" style="margin-left:20px; margin-right:20px; padding:10px; background-color:white"> 
            <div class="progress">
                <div class="stop"></div>
                <div class="go"></div>
                <div class="stop" style="top:290px"></div>
                <div class="go" style="top:300px; background-color:#F1F4F9"></div>
                <div class="stop" style="top:380px; background-color:#F1F4F9"></div>
            </div>
            <div class="details">
                <h5 style="margin-bottom:5px; margin-top:5px">Booking Confirmed</h5>
                <h6 style="margin-bottom:5px; margin-top:0px">MM/DD/YYYY</h6>
                <h6 style="margin-top:0px">HH:MM AM/PM</h6>
            </div>
            <div style="float:right; margin-right:0px; width:75%">
                <h5 style="margin-bottom:5px; margin-top:5px">Vehicle Confirmed</h5>
                <h6 style="margin-bottom:5px; margin-top:0px">MM/DD/YYYY</h6>
                <h6 style="margin-top:0px">HH:MM AM/PM</h6>
            </div>
            <div style="float:right; margin-right:0px; width:75%">
                <h5 style="margin-bottom:5px; margin-top:5px">Ride Confirmed</h5>
                <h6 style="margin-bottom:5px; margin-top:0px">MM/DD/YYYY</h6>
                <h6 style="margin-top:0px">HH:MM AM/PM</h6>
            </div>
            </div>
</div>
@endsection