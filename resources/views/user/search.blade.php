@extends('header')
@extends('user.sidenav')
<style>
    #routes{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container">
    <div class="schedule">
            <h3 style="text-align: center;">{{$trips[0]->routeID}}</h3>
                <div class="subcontainer" style="margin:0px; padding:20px">
                    @foreach($trips as $trip)
                            <div class="scheds">
                                <h3>Vhire {{$trip->vehicleID}} ({{$trip->PlateNum}})</h3>
                                <p><?php echo $trip->{'Location_Name'} ?></p>
                                <p>{{$trip->FreeSeats}}</p>
                                <p>PHP {{$trip->Fare}}.00</p>
                                <a href="/book/{{$trip->tripID}}"><button></button></a>
                            </div>
                    @endforeach
                </div>
    </div>
</div>
@endsection