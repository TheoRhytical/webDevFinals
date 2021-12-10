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
                            <table class="line">
                                    <tr>
                                        <td  style="text-align: left;">
                                            <h3 style="width:100%;">Vhire {{$trip->vehicleID}} ({{$trip->PlateNum}})</h3>
                                        </td>
                                        <td>
                                            <p><?php echo $trip->{'Location_Name'} ?></p>
                                        </td>
                                        <td>
                                            <p>{{$trip->FreeSeats}}</p>
                                        </td>
                                        <td>
                                            <p>PHP {{$trip->Fare}}.00</p>
                                        </td>
                                        <td>
                                            <a href="/book/{{$trip->tripID}}"><button></button></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                    @endforeach
                </div>
    </div>
</div>
@endsection