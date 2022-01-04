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
                    <td>PHP {{$users->Fare}}.00</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Total Amount</td>
                    <td>PHP {{$users->Quantity * $users->Fare}}.00</td>
                </tr>
            </table>
                @if($users->Status == "UNCONFIRMED")
                <form action="/cancel" method="POST">
                    @csrf
                    <input type="hidden" value="{{$users->tripID}}" name="tripID">
                    <input type="hidden" value="{{$users->Quantity}}" name="Quantity">
                    <center><button class="bttn" style="margin-bottom:30px; margin-top:30px" name="orderID" value="{{$users->orderID}}">Cancel</button></center>
                </form>
                @elseif($users->Status == "CONFIRMED")
                    <center><button class="bttn" style="margin-bottom:30px; margin-top:30px; pointer-events: none; background: lime">This Ticket Is Already Confirmed</button></center>
                @else()
                    <center><button class="bttn" style="margin-bottom:30px; margin-top:30px; pointer-events: none;background: red">This Ticket Is Already Cancelled</button></center>
                @endif()
            </div>
        </div>
        <div class="container" style="width:21%; float:right; padding:5px">
            <center><h3>Booking Details</h3></center>
            <h1 style="margin-left:20px; margin-right:20px; text-align:center; cursor:pointer">Ticket #{{$users->orderID}}</h1>
            @if($users->Status == "UNCONFIRMED")
            <center><img src='https://chart.googleapis.com/chart?cht=qr&chl=http%3A%2F%2F127.0.0.1%3A8000%2Fconfirm%2F{{$users->orderID}}&chs=180x180&choe=UTF-8&chld=L|2' rel='nofollow' alt='qr code'><center>
            @endif()
            <hr></hr>
            <div class="subcontainer" style="margin-left:20px; margin-right:20px; padding:10px; background-color:white"> 
            @if($users->Status == "CONFIRMED")
            <div class="progress">
                <div class="stop"></div>
                <div class="go"></div>
            </div>
            <div class="details">
                <h5 style="margin-bottom:5px; margin-top:5px">Booking Confirmed</h5>
                <h6 style="margin-bottom:5px; margin-top:0px">{{date("F j, Y g:i a", strtotime($users->statusChangeDT))}}</h6>
            </div>
            @endif()
            </div>
</div>
@endsection