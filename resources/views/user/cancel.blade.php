@extends('header')
@extends('user.sidenav')
<style>
    #tic{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container" style="width:40%; float:left; margin-left:12%">
            <h1>November 18, 2021</h1>
            <div class="subcontainer table"> 
            <table>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Vhire No</td>
                    <td>Plate Number</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Terminal</td>`
                    <td><?php echo $users[1]->{'Location_Name'}?></td>
                    
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Time</td>
                    <td>ETD - ETA</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Vhire No</td>
                    <td>Plate Number</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Quantity</td>
                    <td>No. of seats</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Php 100.00</td>
                    <td>Fare Price</td>
                </tr>
                <tr>
                    <td style="color:#4C15E9; font-weight:bold">Total Amount</td>
                    <td>Price x Quantity</td>
                </tr>
            </table>
            <center><button class="bttn" style="margin-bottom:30px; margin-top:30px">Cancel</button></center>
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