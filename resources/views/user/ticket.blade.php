@extends('header')
@extends('user.sidenav')
<style>
    #tic{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container">
    <div class="subcontainer" style="padding:20px">
        <h3 class="history">Ticket History</h3>
        <a href="cancel">
            <div class="tick">
                <h3>Origin - Destination</h3>
                <p style="float:right; padding-right:25px; padding-top:5px"><b style="color:#4C15E9">Php 100</b></p><br>
                <p>Schedule Time</p>
                <p>&nbsp; - &nbsp;</p>
                <p>Schedule Date</p>
                <p>&nbsp; - &nbsp;</p>
                <p>Terminal</p>
                <p>&nbsp; - &nbsp;</p>
                <p>Qty. of Seats</p>
            </div>
        </a>
        <a href="cancel">
            <div class="tick">
                <h3>Origin - Destination</h3>
                <p style="float:right; padding-right:25px; padding-top:5px"><b style="color:#4C15E9">Php 500</b></p><br>
                <p>Schedule Time</p>
                <p>&nbsp; - &nbsp;</p>
                <p>Schedule Date</p>
                <p>&nbsp; - &nbsp;</p>
                <p>Terminal</p>
                <p>&nbsp; - &nbsp;</p>
                <p>Qty. of Seats</p>
            </div>
        </a>
    </div>
</div>
@endsection