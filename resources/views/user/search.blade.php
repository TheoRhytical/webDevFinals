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
            <h3 style="text-align: center;">{{$trips->first()->routeID}}</h3>
                <div class="subcontainer" style="margin:0px; padding:20px">
                    <form action="/book" method="POST">
                    @csrf
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
                                        @if($trip->FreeSeats > 0)
                                        <td>
                                            <button type="submit" value="{{$trip->tripID}}" name="tripID"></button>
                                        </td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                    @endforeach
            </form>
        </div>
    </div>
</div>
@endsection