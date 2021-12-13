@extends('admin.header')
@extends('admin.sidenav')
<style>
    #routes{
        background-color: #EFF2FF;
    }

    #hidden{
        display: none;
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

            <td class="rrr">{{$route->O_termID}}-{{$route->D_termID}}</td>
            <td class="ot">{{$route->O_termID}}</td>
            <td class="dt">{{$route->D_termID}}</td>
            <td class="fare">{{$route->Fare}}</td>
            <td class="time" style="display: none;"><?php echo $route->{'Trip Duration'}; ?></td>
            <td class="e-route" style="width: 6%;cursor: pointer;"><img src="{{url('images/edit.png')}}"/></td>
             <td  class="Btnd"  data-route-id="{{$route->O_termID}}-{{$route->D_termID}}" style="width: 6%;cursor: pointer;"><img src="{{url('images/delete-dark.png')}}"/></td>

            <td style="width: 6%;cursor: pointer;"><img src="{{url('images/refresh.png')}}"/></td>
        </tr>
    @endforeach
    </table></center>
    </div>

    <!--Update Modal-->
    <div id="edit-route" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="form">
        <form method="POST" action="{{route('add.routes')}}"> 
            @csrf
            <label for="rname">Route name</label>
            <input type="text" id="rname"></input><br><br>
            <label for="L1">Terminal origin</label>
            
            <select id="T1" name="T1">
                @foreach ($rname as $indivroute)  
                <option value="{{$indivroute->O_termID}}">{{$indivroute->O_termID}}</option>
                @endforeach
            </select><br><br><br>
            <label for="L2">Terminal destination</label>
            <select id="T2" name="T2">
                @foreach ($rname as $indivroute)  
                <option value="{{$indivroute->D_termID}}">{{$indivroute->D_termID}}</option>
                @endforeach
    
            </select><br><br><br>
            <label for="rname">Fare Price</label>
            <input id="fare" name="fare" ></input><br><br>

            <label for="rname">Travel Time</label>
            <input id="TT" name="Travel"></input><br>

            <div class="confirm">
                <button style="background-color: #27C124" id="save"  type="submit">SAVE</button>
                <button style="background-color: #FFA800; float:right;">CANCEL</button>
            </div>
        </form>
    </div>
    <img src="{{url('images/modal.png')}}" class="modal-img">
  </div>
</div>

    <!--Modal-->
<div id="myAddModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="form">
        <form id="add_route_form" method="POST" action="{{route('add.routes')}}"> 
            @csrf
            <label for="rname">Route name</label>
            <input type="text" id="rname"></input><br><br>
            <label for="L1">Terminal origin</label>
            
            <select id="T1" name="T1">
                @foreach ($rname as $indivroute)  
                <option value="{{$indivroute->O_termID}}">{{$indivroute->O_termID}}</option>
                @endforeach
            </select><br><br><br>
            <label for="L2">Terminal destination</label>
            <select id="T2" name="T2">
                @foreach ($rname as $indivroute)  
                <option value="{{$indivroute->D_termID}}">{{$indivroute->D_termID}}</option>
                @endforeach
    
            </select><br><br><br>
            <label for="rname">Fare Price</label>
            <input id="fare" name="fare" ></input><br><br>

            <label for="rname">Travel Time</label>
            <input id="TT" name="Travel"></input><br>

        </form>
        <div class="confirm">
            <button form="add_route_form" style="background-color: #27C124" id="save"  type="submit">SAVE</button>
            <button class="exit-modal" style="background-color: #FFA800; float:right;">CANCEL</button>
        </div>
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
        <form id="route-form" action="deleteRoute" method="POST">
                @csrf
                <input type="hidden" id="curr-route" name="routeID"/>
        </form>
        <button form="route-form" style="background-color: #27C124" id="condition">YES</button>
        <button class="exit-modal" style="background-color: #FFA800; float:right;">NO</button>
    </div>
  </div>
</div>
</div>


@endsection
