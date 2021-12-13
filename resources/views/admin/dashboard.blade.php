@extends('admin.header')
@extends('admin.sidenav')
<style>
    #dashboard{
        background-color: #EFF2FF;
    }

    .scrolly{
        overflow-y: auto;
        height: 680px;
    }

    body{
        overflow: hidden;
    }

    ::-webkit-scrollbar {
        display: none;
        padding: 0;
        -ms-overflow-style: none;
        scrollbar-width: 0px;
    }
    
    ::-webkit-scrollbar-track {
        border-radius: 5px;
    }
    
    ::-webkit-scrollbar-thumb { 
        border-radius: 5px;
    }

    
</style>
@section('content')
<div class="container grey-bg scrolly">
    <div class="subcontainer white-bg" style="background-color: #FFFFFF; padding:10px">
        <table>
            <tr>
            <th>Total Bookings</th>
            <th>Confirmed Bookings</th>
            <th>Total Revenue</th>
            <th>Tickets Sold</th>
            </tr>
            <tr>
            <td class="up">{{$total}}</td>
            <td class="up">{{$sold}}</td>
            <td class="up">P{{$revenue}}.00</td>
            <td class="up">{{$sold}}</td>
            </tr>
        </table>
    </div>
    <div class="tab">
        <button id="rb">RECENT BOOKINGS</button>
        <button id="vd" style="background-color: #826DFF; color: white">VHIRE DEPARTURES</button>
    </div>
    <div class="subcontainer white-bg" id="bookings">
        <h1 style="text-align: center; background-color:white; color:#250B71;font: weight 800px;">RECENT BOOKINGS</h1>
        @foreach($booking as $book)
        <div class="routes a-route" style="margin-right: 4px;">
            <p class="small">{{$book->orderID}}</p> <br>
            <p>{{$book->orderCreationDT}}</p> <br>
            <p class="big">{{$book->username}}</p> <br>
            @if($book->Status=="UNCONFIRMED")
                <p class="status" style="color: white; background-color: #FFA800">Status: {{$book->Status}}</p> <br>
            @elseif($book->Status=="CANCELLED")
                <p class="status" style="color: white; background-color: #C12424">Status: {{$book->Status}}</p> <br>
            @else
                <p class="status" style="color: white;">Status: {{$book->Status}}</p> <br>
            @endif
            <p style="font-weight: 800;">FROM {{$book->origin}} <br> TO {{$book->dest}}</p> <br>
            <p>{{$book->ETD}} - {{$book->ETA}}</p> <br>
            <p>Plate Number {{$book->PlateNum}}</p> <br>
        </div>
        @endforeach
    </div>
    <div class="subcontainer white-bg" id="departures" style="display: none;">
        <h1 style="text-align: center; background-color:white; color:#250B71;font: weight 800px;">VHIRE DEPARTURES</h1>
        <table class="departure" cellspacing="0" cellpadding="0">
            <tr>
                <th>Vhire #</th>
                <th>Plate Number</th>
                <th>Destination</th>
                <th>Driver</th>
                <th>Total Bookings</th>
                <th>Tickets Sold</th>
            </tr>
            @foreach($vhire as $vehicle)
            <tr>
                <td>VHIRE {{$vehicle->vehicleID}}</td>
                <td>{{$vehicle->PlateNum}}</td>
                <td>{{$vehicle->routeID}}</td>
                <td>{{$vehicle->username}}</td>
                <td>{{DB::table('orders')
                    ->join('trip', 'trip.tripID', '=', 'orders.tripID')
                    ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
                    ->where('vhire.vehicleID', '=', $vehicle->vehicleID)
                    ->count()}}
                </td>
                <td>{{DB::table('orders')
                    ->join('trip', 'trip.tripID', '=', 'orders.tripID')
                    ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
                    ->where('vhire.vehicleID', '=', $vehicle->vehicleID)
                    ->where('orders.Status', '=', 'CONFIRMED')
                    ->count()}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
