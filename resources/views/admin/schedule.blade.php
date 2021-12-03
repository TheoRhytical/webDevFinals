@extends('admin.header')
@extends('admin.sidenav')
<style>
    #scheds{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container grey-bg">
    <div class="btns" style="display: inline-block;">
        <div class="button vhire" style="float: left;margin-left:25px; padding: 7px 15px 7px 0px">
        <img src="{{url('images/bus.png')}}" style="position: relative;left:15%;top:2px;height:25px;float:left;"/>
            ADD VHIRE
        </div>
        <div class="mini-btn" >
            <label style="position:relative; top: 5px; font-weight:800;">FILTER BY ROUTE:</label>
            <select class="filter">
                <option>ALL</option>
            </select>
        </div>
    </div>

    <div class="subcontainer white-bg" style="background-color: #FFFFFF; padding:0px 0px 0px 0px;overflow: hidden; position:relative; top: 0px;border-radius:12px">
    <center><table class="table new"  cellspacing="0" cellpadding="0" style="margin:0%; border-collapse: separate;border-spacing: 0px 25px;">
        <tr style="background-color: #0F0645;color:white;">
            <th>VHIRE #</th>
            <th>ROUTE</th>
            <th>DEPART - ARRIVE</th>
            <th>DRIVER</th>
            <th style="border-radius: 0px;">STATUS</th>
            <th style="border-radius: 0px 12px 12px 0px;"></th>
        </tr>
        <tr class="sc">
            <td>1234</td>
            <td>CEBU-CORDOVA</td>
            <td>08:05-15:00</td>
            <td>CRISPIN</td>
            <td>ACTIVE <img src="{{url('images/active.png')}}" style="float: right;margin-right:20px"/></td>
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
            <td>1234</td>
            <td>CEBU-CORDOVA</td>
            <td>08:05-15:00</td>
            <td>CRISPIN</td>
            <td>INACTIVE <img src="{{url('images/inactive.png')}}" style="float: right;margin-right:20px"/></td>
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
  <div class="modal-content dark" style="height: 450px;">
    <span class="close">&times;</span>
    <div class="vhire-form">
        <form>
            <div class="form-left">
                <label>VHIRE #</label><br>
                <input type="text"/><br><br>
                <label>DEPARTURE TIME</label><br> <!--timeof departure-->
                <select>
                    <option>1</option>
                </select>
                <br><br>
                <label>ROUTE</label><br>
                <select>
                    <option>1</option>
                </select>
            </div>
            <div class="form-right">
                <label>DRIVER</label><br>
                <select>
                    <option>1</option>
                </select>
                <br><br>
                <label>ARRIVAL TIME</label><br><!--timeof arrival-->
                <select>
                    <option>1</option>
                </select>
                <br><br>
            </div>
        </form>
    </div>
    <div class="confirm" style="float: left;width:90%;margin-left:30px;">
        <button style="background-color: #27C124">SAVE</button>
        <button style="background-color: #FFA800; float:right;">CANCEL</button>
    </div>
  </div>
</div>
</div>

<!-- The Modal -->
<div id="del-sched" class="modal">

  <!-- Modal content -->
  <div class="modal-content dark">
    <span class="close">&times;</span>
    <center><h2>ARE YOU SURE YOU WANT TO<br> DELETE SELECTED SCHEDULE?</h2></center>
    <div class="confirm" style="float: left;width:90%;margin-left:30px;">
        <button style="background-color: #27C124">YES</button>
        <button style="background-color: #FFA800; float:right;">NO</button>
    </div>
  </div>
</div>


@endsection
