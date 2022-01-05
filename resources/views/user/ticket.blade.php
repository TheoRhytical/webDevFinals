@extends('header')
@extends('user.sidenav')
<style>
    #tic{
        background-color: #EFF2FF;
    }
    button{
        all:initial;
        width: 100%;
    }
</style>
@section('content')
<div class="container">
    <div class="subcontainer" style="padding:20px">
        <h3 class="history">Ticket History</h3>
        <form action="/TicketDetails" method="POST">
        @csrf
        @foreach($orders as $order)
        <button type="submit" name="orderID" value="{{$order->orderID}}">
            @if($order->Status == "CONFIRMED")
            <div class="tick" style="background: #BDFCC9">
            @elseif($order->Status == "CANCELLED")
            <div class="tick" style="background: #FAA0A0">
            @else()
            <div class="tick">
            @endif()
                <h3>{{$order->O_Loc}} - {{$order->D_Loc}}</h3>
                <p style="float:right; padding-right:25px; padding-top:5px"><b style="color:#4C15E9">PHP {{$order->AmountDue}}.00</b></p><br>
                <p><b>Time</b></p>
                <p>{{substr($order->ETD,0,-3)}}-{{substr($order->ETA,0,-3)}}</p>
                <p><b>Date</b></p>
                <p>{{date('F d, Y', strtotime($order->Date))}}</p><br>
                <p><b>Terminal</b></p>
                <p>{{$order->O_Loc}}</p>
                <p><b>Quantity</b></p>
                <p>{{$order->Quantity}}</p>
            </div>
        </button>
        @endforeach
        </form>
    </div>
</div>
@endsection
<script>
    
</script>