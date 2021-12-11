@extends('admin.header')
@extends('admin.sidenav')
<style>
    #acc{
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
            ADD ACCOUNT
        </div>
        <div class="mini-btn">
            <button style="background-color: #4C15E9;">ALL</button>
            <button>ACTIVE</button>
            <button>INACTIVE</button>
        </div>
    </div>
    <center><table class="table new black"  cellspacing="0" cellpadding="0" style="margin:0%; border-collapse: separate;border-spacing: 0px 25px;">
        <tr style="background-color: #0F0645;color:white;">
            <th>ACCOUNT</th>
            <th>EMAIL</th>
            <th style="font-size: 14px;">REGISTRATION DATE/TIME</th>
            <th>STATUS</th>
            <th style="border-radius: 0px 12px 12px 0px;"></th>
        </tr>
        <tr class="sc">
            <td>ADMIN</td>
            <td>admin@admin.com</td>
            <td>12/01/21</td>
            <td>ACTIVE<img src="{{url('images/active.png')}}" style="float: right;margin-right:20px"/></td>
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
            <td>ADMIN</td>
            <td>admin@admin.com</td>
            <td>12/01/21</td>
            <td>INACTIVE<img src="{{url('images/inactive.png')}}" style="float: right;margin-right:20px"/></td>
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
</div>

<!-- The Modal -->
<div id="add-vhire" class="modal">

  <!-- Modal content -->
  <div class="modal-content dark" style="height: 600px; margin-top:-5%; padding:0px">
    <img src="{{url('images/modal.png')}}" style="width:100%;height: 250px; object-fit:cover;object-position: 0 20%;border-radius:12px 12px 0px 0px">
    <span class="close" style="position: absolute;top:5%; right:27%; color:black">&times;</span>
    <div class="vhire-form" id="modal-book" style="margin-left: 4%; margin-top:auto">
        <form>
            <div class="form-left">
                <label>EMAIL</label><br>
                <input type="email"/>
                <br><br>
                <label>PASSWORD</label><br>
                <input type="password"/><br><br>
                <label>TERMINAL</label>
                <select>
                    <option>1</option>
                </select>
            </div>
            <div class="form-right">
                <label>NAME</label><br>
                <input type="text"/>
                <br><br>
                <label>PHONE NUMBER</label><br>
                <input type="tel"/>
            </div>
            <div class="confirm" style="float: left;width:90%;margin-left:30px;margin-top:5%">
                <button style="background-color: #27C124">SAVE</button>
                <button style="background-color: #FFA800; float:right;">CANCEL</button>
            </div>
        </form>
    </div>
</div>
</div>

<!-- The Modal -->
<div id="del-sched" class="modal">

  <!-- Modal content -->
  <div class="modal-content dark">
    <span class="close">&times;</span>
    <center><h2>ARE YOU SURE YOU WANT TO<br> DELETE SELECTED ACCOUNT?</h2></center>
    <div class="confirm" style="float: left;width:90%;margin-left:30px;">
        <button style="background-color: #27C124">YES</button>
        <button style="background-color: #FFA800; float:right;">NO</button>
    </div>
  </div>
</div>
@endsection
