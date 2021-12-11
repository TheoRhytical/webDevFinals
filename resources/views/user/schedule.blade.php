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
        <h2>{{ date('F d, Y') }}</h2>
            <form action="/book" method="POST">
                @csrf
            @foreach($terms as $term)
            <h3 style="text-align: center;"><?php echo $term->{'Location_Name'} ?></h3>
                <div class="subcontainer" style="margin:0px; padding:20px">
                    @foreach($trips as $trip)
                        @if($trip->O_termID == $term->terminalID)
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
                                            <button type="submit" value="{{$trip->tripID}}" name="tripID"></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        @endif
                    @endforeach
                </div>
                <br>
            @endforeach
        </form>
    </div>
</div>
@endsection