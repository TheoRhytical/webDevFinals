@extends('admin.header')
@extends('admin.sidenav')
<style>
    #dashboard{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container grey-bg">
    <div class="subcontainer white-bg" style="background-color: #FFFFFF; padding:10px">
        <table>
            <tr>
            <th>Total Bookings</th>
            <th>Confirmed Bookings</th>
            <th>Total Revenue</th>
            <th>Tickets Sold</th>
            </tr>
            <tr>
            <td class="up">4</td>
            <td class="up">2</td>
            <td class="up">P1987.00</td>
            <td class="up">3</td>
            </tr>
        </table>
    </div>
    <div class="tab">
        <button id="rb">RECENT BOOKINGS</button>
        <button id="vd" style="background-color: #826DFF; color: white">VHIRE DEPARTURES</button>
    </div>
    <div class="subcontainer white-bg" id="bookings">
        <h1 style="text-align: center; background-color:white; color:#250B71;font: weight 800px;">RECENT BOOKINGS</h1>
        <div class="routes a-route">
            <p class="small">Order ID</p> <br>
            <p>Time and Date</p> <br>
            <p class="big">Juan Dela Cruz</p> <br>
            <p class="status" style="color: white;">Status: Confirmed</p> <br>
            <p style="font-weight: 800;">FROM Cebu TO Lapu-Lapu City</p> <br>
            <p>Mandaue City, Cebu at 08-26-2021</p> <br>
            <p>VHire Code #1</p> <br>
        </div>
        <div class="routes a-route" style="float:right">
            <p class="small">Order ID</p> <br>
            <p>Time and Date</p> <br>
            <p class="big">Aling Marites</p> <br>
            <p class="status" style="color: white; background-color:#FFA800;">Status: Pending</p> <br>
            <p style="font-weight: 800;">FROM Cebu TO Lapu-Lapu City</p> <br>
            <p>Mandaue City, Cebu at 08-26-2021</p> <br>
            <p>VHire Code #1</p> <br>
        </div>
        <div class="routes a-route">
            <p class="small">Order ID</p> <br>
            <p>Time and Date</p> <br>
            <p class="big">Aling Marites</p> <br>
            <p class="status" style="color: white; background-color:#FFA800;">Status: Pending</p> <br>
            <p style="font-weight: 800;">FROM Cebu TO Lapu-Lapu City</p> <br>
            <p>Mandaue City, Cebu at 08-26-2021</p> <br>
            <p>VHire Code #1</p> <br>
        </div>
        <div class="routes a-route" style="float:right">
            <p class="small">Order ID</p> <br>
            <p>Time and Date</p> <br>
            <p class="big">Juan Dela Cruz</p> <br>
            <p class="status" style="color: white;">Status: Confirmed</p> <br>
            <p style="font-weight: 800;">FROM Cebu TO Lapu-Lapu City</p> <br>
            <p>Mandaue City, Cebu at 08-26-2021</p> <br>
            <p>VHire Code #1</p> <br>
        </div>
    </div>
    <div class="subcontainer white-bg" id="departures" style="display: none;">
        <h1 style="text-align: center; background-color:white; color:#250B71;font: weight 800px;">VHIRE DEPARTURES</h1>
        <table class="departure" cellspacing="0" cellpadding="0">
            <tr>
                <th>Vhire #</th>
                <th>Vhire Code</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Total Bookings</th>
                <th>Tickets Sold</th>
            </tr>
            <tr>
                <td>VHIRE 1</td>
                <td>1421</td>
                <td>LILOAN - CONSOLACION</td>
                <td>11-23-21</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr>
                <td>VHIRE 2</td>
                <td>1422</td>
                <td>CEBU - LAPU-LAPU</td>
                <td>11-30-21</td>
                <td>6</td>
                <td>2</td>
            </tr>
        </table>
    </div>
</div>
@endsection
