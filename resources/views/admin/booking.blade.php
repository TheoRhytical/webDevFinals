@extends('admin.header')
@extends('admin.sidenav')
<style>
    #book{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container grey-bg">
    <div class="subcontainer white-bg" style="background-color: #FFFFFF; padding:0px 0px 0px 0px;overflow: hidden; position:relative; top: 0px;border-radius:12px">
    <div class="btns" style="width:95%; float: left; margin: 5% 0% 0% 3%; text-align:center;">
        <div class="button vhire" style="float: left; padding: 7px 25px 7px 0px; width:25%;">
        <img src="{{url('images/booking.png')}}" style="position: relative;left:12%;top:2px;height:15px;float:left;"/>
        <img src="{{url('images/booking1.png')}}" style="position: relative;left:0%;top:7px;height:15px;float:left;"/>
            ADD BOOKING
        </div>
        <div class="mini-btn red" style="width:70%">
            <button style="background-color: #4C15E9;">ALL</button>
            <button>CONFIRMED</button>
            <button>PENDING</button>
            <button>CANCELLED</button>
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
        <tr class="sc">
            <td>Juan Dela Cruz</td>
            <td>08-15-21<br> 15:00 - 19:20</td>
            <td>CEBU-CORDOVA</td>
            <td>CONFIRMED <img src="{{url('images/active.png')}}" style="float: right;margin-right:20px"/></td>
            <td>
                <table>
                    <tr>
                        <td class="vhire" style="cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
                        <td class="del-scheds" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="sc">
            <td>Juan Dela Cruz</td>
            <td>08-15-21<br> 15:00 - 19:20</td>
            <td>CEBU-CORDOVA</td>
            <td>PENDING <img src="{{url('images/inactive.png')}}" style="float: right;margin-right:20px"/></td>
            <td>
                <table>
                    <tr>
                        <td class="vhire" style="cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
                        <td class="del-scheds" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="sc">
            <td>Juan Dela Cruz</td>
            <td>08-15-21<br> 15:00 - 19:20</td>
            <td>CEBU-CORDOVA</td>
            <td>CANCELLED <img src="{{url('images/cancelled.png')}}" style="float: right;margin-right:20px"/></td>
            <td>
                <table>
                    <tr>
                        <td class="vhire" style="cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
                        <td class="del-scheds" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table></center>
    </div>
    <img src="{{url('images/booking-img.png')}}" style="position: relative; left:6%"/>
</div>

<!-- The Modal -->
<div id="add-vhire" class="modal">

  <!-- Modal content -->
  <div class="tab modal-tab">
        <button id="bd" style="background-color: #0F0645; color: white">BOOKINGS DETAIL</button>
        <button id="pd" style="background-color: #4C15E9; color: white">PASSENGER DETAIL</button>
    </div>
  <div class="modal-content dark" style="height: 450px;border-radius: 0px 18px 18px 18px">
    <span class="close">&times;</span>
    <div class="vhire-form" id="modal-book">
        <form>
            <div class="form-left">
                <label>DATE</label><br>
                <input type="date"/><br><br>
                <label>ROUTE</label><br>
                <select>
                    <option>1</option>
                </select>
                <br><br>
                <label>DEPARTURE TIME</label><br>
                <select>
                    <option>1</option>
                </select>
            </div>
            <div class="form-right">
                <label>VHIRE</label><br>
                <select>
                    <option>1</option>
                </select>
                <br><br>
                <label>STATUS</label><br>
                <select>
                    <option>PENDING</option>
                    <option>CONFIRMED</option>
                </select>
                <br><br>
                <label>ARRIVAL TIME</label><br>
                <select>
                    <option>1</option>
                </select>
            </div>
            <div class="confirm" style="float: left;width:90%;margin-left:30px;">
                <button style="background-color: #27C124">SAVE</button>
                <button style="background-color: #FFA800; float:right;">CANCEL</button>
            </div>
        </form>
    </div>
    <div class="vhire-form" id="modal-passenger" style="display: none;">
        <form>
            <div class="form-left">
                <label>PASSENGER</label><br>
                <select>
                    <option>1</option>
                </select>
                <br><br>
                <label>PHONE NUMBER</label><br>
                <input type="tel"/>
            </div>
            <div class="form-right">
                <label>ADDRESS</label><br>
                <select>
                    <option>1</option>
                </select>
                <br><br>
                <label>EMAIL</label><br>
                <select>
                    <option>1</option>
                </select>
            </div>
            <div class="confirm" style="float: left;width:90%;margin-left:30px;">
                <button style="background-color: #27C124">SAVE</button>
                <button style="background-color: #FFA800; float:right;">CANCEL</button>
            </div>
        </form>
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div id="del-sched" class="modal">

  <!-- Modal content -->
  <div class="modal-content dark">
    <span class="close">&times;</span>
    <center><h2>ARE YOU SURE YOU WANT TO<br> DELETE SELECTED BOOKING?</h2></center>
    <div class="confirm" style="float: left;width:90%;margin-left:30px;">
        <button style="background-color: #27C124">YES</button>
        <button style="background-color: #FFA800; float:right;">NO</button>
    </div>
  </div>
</div>


@endsection
