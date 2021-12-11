@extends('admin.header')
@extends('admin.sidenav')
<style>
    #routes{
        background-color: #EFF2FF;
    }
</style>
@section('content')
<div class="container grey-bg">
    <center><img src="{{url('images/routes.png')}}" style="width:88%; object-fit:cover; height: 380px;"></img></center>
    <div class="btns" style="display: inline-block;">
        <div class="button myBtn" style="float: left;margin-left:25px;">
            <img src="{{url('images/map.png')}}" style="position: relative;left:-10%;top:2px;"/>
            ADD ROUTE
        </div>
    </div>
    <center><table class="table" cellspacing="0" cellpadding="0">
        <tr style="background-color: #0F0645;color:white;">
            <th>ROUTE</th>
            <th>FROM</th>
            <th>TO</th>
            <th>FARE PRICE</th>
            <th></th>
        </tr>
    </table></center>
    <div class="subcontainer white-bg" style="background-color: #FFFFFF; padding:0px 0px 0px 0px; position:relative; top: 0px;border-radius:12px">
    <center><table class="table"  cellspacing="0" cellpadding="0" style="width:100%; margin:0%; border-collapse: separate;border-spacing: 3px 25px;">
    @foreach($rname as $route)
        <tr class="row">
            <td>{{$rname[0]->O_termID}}-{{$rname[0]->D_termID}}</td>
            <td>{{$rname[0]->O_termID}}</td>
            <td>{{$rname[0]->D_termID}}</td>
            <td>{{$rname[0]->Fare}}</td>
            <td class="myBtn" style="width: 6%;cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
            <td class="Btnd" style="width: 6%;cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>
            <td style="width: 6%;cursor: pointer;"><img src="{{url('images/refresh.png')}}"/></td>
        </tr>
    @endforeach
    </table></center>
    </div>

    <!--Modal-->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="form">
        <form method="POST" action="{{route('add.routes')}}"> 
           @csrf
            <label for="rname">Route name</label>
            <input type="text" id="rname"></input><br><br>
            <label for="L1">Terminal origin</label>
            
            
            <select id="T1">
                @foreach ($rname as $indivroute)  
                <option value="{{$indivroute->O_termID}}">{{$indivroute->O_termID}}</option>
                @endforeach
            </select><br><br><br>
            <label for="L2">Terminal destination</label>
            <select id="T2">
                @foreach ($rname as $indivroute)  
                <option value="{{$indivroute->D_termID}}">{{$indivroute->D_termID}}</option>
                @endforeach
    
            </select><br><br><br>
            <label for="rname">Fare Price</label>
            <input id="fare"></input><br>

            <label for="rname">Travel Time</label>
            <input id="TT"></input><br>

            <div class="confirm">
                <button style="background-color: #27C124" id="save"  type="submit">SAVE</button>
                <button style="background-color: #FFA800; float:right;">CANCEL</button>
            </div>
        </form>
    </div>
    <img src="{{url('images/modal.png')}}" class="modal-img">
  </div>
</div>

<!-- The Modal -->
<div id="mymodal" class="modal">

  <!-- Modal content -->
  <div class="modal-content dark">
    <span class="close">&times;</span>
    <center><h2>ARE YOU SURE YOU WANT TO <br>DELETE SELECTED ROUTE?</h2></center>
    <div class="confirm" style="float: left;width:90%;margin-left:30px;">
        <button style="background-color: #27C124" id="condition">YES</button>
        <button style="background-color: #FFA800; float:right;">NO</button>
    </div>
  </div>
</div>
</div>


@endsection
