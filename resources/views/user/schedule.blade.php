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
            @foreach($terms as $term)
            <h3 style="text-align: center;"><?php echo $term->{'Location Name'} ?></h3>
                <div class="subcontainer" style="margin:0px; padding:20px">
                    @foreach($trips as $trip)
                        @if($trip->O_termID == $term->terminalID)
                            <div class="scheds">
                                <h3>Vhire {{$trip->vehicleID}} ({{$trip->PlateNum}})</h3>
                                <p><?php echo $trip->{'Location Name'} ?></p>
                                <p>{{$trip->FreeSeats}}</p>
                                <p>PHP {{$trip->Fare}}.00</p>
                                <a href="book/{{$trip->tripID}}"><button></button></a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
    </div>
</div>
@endsection