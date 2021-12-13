@extends('admin.header')
@extends('admin.sidenav')
<style>
    #book{
        background-color: #EFF2FF;
    }

    #hidden {
        display:none;    
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
    <div class="subcontainer white-bg" style="background-color: #FFFFFF; padding:0px 0px 0px 0px;overflow: hidden; position:relative; top: 0px;border-radius:12px">
    <div class="btns" style="width:95%; float: left; margin: 5% 0% 0% 3%; text-align:center;">
        <div class="button vhire" style="float: left; padding: 7px 25px 7px 0px; width:25%;">
        <img src="{{url('images/booking.png')}}" style="position: relative;left:12%;top:2px;height:15px;float:left;"/>
        <img src="{{url('images/booking1.png')}}" style="position: relative;left:0%;top:7px;height:15px;float:left;"/>
            ADD BOOKING
        </div>
        <div class="mini-btn red" style="width:70%">
            <button style="background-color: #4C15E9;" id="bookALL">ALL</button>
            <button id="bookCON">CONFIRMED</button>
            <button id="bookPEN">UNCONFIRMED</button>
            <button id="bookCAN">CANCELLED</button>
        </div>
    </div>
    <center><table class="table new black"  cellspacing="0" cellpadding="0" style="margin:0%; border-collapse: separate;border-spacing: 0px 25px;">
        <tr style="background-color: #0F0645;color:white;">
            <th>PASSENGER</th>
            <th>DATE/TIME</th>
            <th>VHIRE - ROUTE</th>
            <th>STATUS</th>
            <th style="border-radius: 0px 12px 12px 0px;"></th>
        </tr>
            @foreach($book as $booking)
            <tr class="sc bookAll">
                <td id="hidden">{{$booking->orderID}}</td>
                <td class="bpass">{{$booking->username}}</td>
                <td class="dateT">{{$booking->orderCreationDT}}</td>
                <td class="brid">{{$booking->routeID}}</td>
                <td class="pcs" style="display:none;">{{$booking->Quantity}}</td>
                <td class="tp" style="display:none;">{{$booking->routeID}} &nbsp; {{$booking->ETD}} - {{$booking->ETA}}</td>
                @if($booking->Status == 'CONFIRMED')
                    <td><p class="bstat">{{$booking->Status}}</p> <img src="{{url('images/active.png')}}" style="float: right;margin-right:20px; margin-top:15px;"/></td>
                @elseif($booking->Status == 'UNCONFIRMED')
                    <td><p class="bstat">{{$booking->Status}}</p> <img src="{{url('images/inactive.png')}}" style="float: right;margin-right:20px; margin-top:15px;"/></td>
                @else
                    <td><p class="bstat">{{$booking->Status}}</p> <img src="{{url('images/cancelled.png')}}" style="float: right;margin-right:20px; margin-top:15px;"/></td>
                @endif
                <td>
                    <table>
                        <tr>
                            <td class="e-book" style="cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
                            <td class="del-books" data-book-id="{{$booking->orderID}}" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach


            @foreach($confirmed as $confirm)
            <tr class="sc bookConfirmed" style="display: none;">
                <td id="hidden">{{$booking->orderID}}</td>
                <td class="bpass">{{$booking->username}}</td>
                <td class="dateT">{{$booking->orderCreationDT}}</td>
                <td class="brid">{{$booking->routeID}}</td>
                <td class="pcs" style="display:none;">{{$booking->Quantity}}</td>
                <td class="tp" style="display:none;">{{$booking->routeID}} &nbsp; {{$booking->ETD}} - {{$booking->ETA}}</td>
                <td><p class="bstat">CONFIRMED</p> <img src="{{url('images/active.png')}}" style="float: right;margin-right:20px; margin-top:15px;"/></td>
                <td>
                    <table>
                        <tr>
                            <td class="e-book" style="cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
                            <td class="del-books" data-book-id="{{$confirm->orderID}}" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach

            @foreach($pending as $pend)
            <tr class="sc bookPending" style="display: none;">
                <td id="hidden">{{$booking->orderID}}</td>
                <td class="bpass">{{$booking->username}}</td>
                <td class="dateT">{{$booking->orderCreationDT}}</td>
                <td class="brid">{{$booking->routeID}}</td>
                <td class="pcs" style="display:none;">{{$booking->Quantity}}</td>
                <td class="tp" style="display:none;">{{$booking->routeID}} &nbsp; {{$booking->ETD}} - {{$booking->ETA}}</td>
                <td><p class="bstat">UNCONFIRMED</p> <img src="{{url('images/inactive.png')}}" style="float: right;margin-right:20px; margin-top:15px;"/></td>
                <td>
                    <table>
                        <tr>
                            <td class="e-book" style="cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
                            <td class="del-books" data-book-id="{{$pend->orderID}}" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach

            @foreach($cancelled as $cancel)
            <tr class="sc bookCancel" style="display: none;">
                <td id="hidden">{{$booking->orderID}}</td>
                <td class="bpass">{{$booking->username}}</td>
                <td class="dateT">{{$booking->orderCreationDT}}</td>
                <td class="brid">{{$booking->routeID}}</td>
                <td class="pcs" style="display:none;">{{$booking->Quantity}}</td>
                <td class="tp" style="display:none;">{{$booking->routeID}} &nbsp; {{$booking->ETD}} - {{$booking->ETA}}</td>
                <td><p class="bstat">CANCELLED</p> <img src="{{url('images/cancelled.png')}}" style="float: right;margin-right:20px; margin-top:15px;"/></td>
                <td>
                    <table>
                        <tr>
                            <td class="e-book" style="cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
                            <td class="del-books" data-book-id="{{$cancel->orderID}}" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach

    </table></center>
    </div>
    <img src="{{url('images/booking-img.png')}}" style="position: relative; left:6%"/>
</div>

<!-- The Update Modal -->
<div id="edit-book" class="modal"> 

  <!-- Modal content -->
  <div class="modal-content dark" style="height: 450px;">
    <span class="close">&times;</span>
    <div class="vhire-form" id="modal-book">
        <form action="book_form" method="POST" id="b-form">
            @csrf
            <div class="form-left">
                <label>DATE edit</label><br>
                <input type="text" name="date" id="date" readonly/><br><br>
                <label>QUANTITY</label><br>
                <input type="number" name="quantity" id="qty" readonly/><br><br>
                <label>PASSENGER</label><br>
                <input name="passID" id="passID" readonly/>
            </div>
            <div class="form-right">
                <label>TRIP</label><br>
                <input name="tripID" id="tid" readonly/>
                <br><br>
                <label>STATUS</label><br>
                <select name="book_status" id="bstat">
                    <option>UNCONFIRMED</option>
                    <option>CONFIRMED</option>
                    <option>CANCELLED</option>
                </select>
            </div>
        </form>
        <div class="confirm" style="float: left;width:90%;margin-left:30px;">
            <button form="b-form" style="background-color: #27C124">SAVE</button>
            <button class="exit-modal" style="background-color: #FFA800; float:right;">CANCEL</button>
        </div>
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div id="add-vhire" class="modal"> 

  <!-- Modal content -->
  <div class="modal-content dark" style="height: 450px;">
    <span class="close">&times;</span>
    <div class="vhire-form" id="modal-book">
        <form action="book_form" method="POST" id="b-form">
            @csrf
            <div class="form-left">
                <label>DATE</label><br>
                <input type="date" name="date"/><br><br>
                <label>QUANTITY</label><br>
                <input type="number" name="quantity"/><br><br>
                <label>PASSENGER</label><br>
                <select name="passID">
                @foreach($passenger as $pass)
                    <option value="{{$pass->userID}}">{{$pass->username}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-right">
                <label>TRIP</label><br>
                <select name="tripID">
                @foreach($trips as $trip)
                    <option value="{{$trip->tripID}}">{{$trip->routeID}} &nbsp; {{$trip->ETD}} - {{$trip->ETA}}</option>
                @endforeach
                </select>
                <br><br>
                <label>STATUS</label><br>
                <select name="book_status">

                    <option value="CONFIRMED">CONFIRMED</option>
                    <option value="UNCONFIRMED">UNCONFIRMED</option>
                    <option value="CANCELLED">CANCELLED</option>

                </select>
            </div>
        </form>
        <div class="confirm" style="float: left;width:90%;margin-left:30px;">
            <button form="b-form" style="background-color: #27C124">SAVE</button>
            <button class="exit-modal" style="background-color: #FFA800; float:right;">CANCEL</button>
        </div>
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div id="del-book-modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content dark">
    <span class="close">&times;</span>
    <center><h2>ARE YOU SURE YOU WANT TO<br> DELETE SELECTED BOOKING?</h2></center>
    <div class="confirm" style="float: left;width:90%;margin-left:30px;">
        <form id="del-form" action="delete_books" method="POST">
            @csrf
            <input name="del_book" type="hidden" id="del_book" value="">
        </form>
        <button form="del-form" style="background-color: #27C124">YES</button>
        <button class="exit-modal" style="background-color: #FFA800; float:right;">NO</button>
    </div>
  </div>
</div>
@endsection
