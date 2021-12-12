@extends('admin.header')
@extends('admin.sidenav')


<style>
    #acc {
        background-color: #EFF2FF;
    }
    #hidden {
        display:none;    
    }



</style>
@section('content')

<div class="container grey-bg">
    <div class="subcontainer white-bg" style="background-color: #FFFFFF; padding:0px 0px 0px 0px;overflow: hidden; position:relative; top: 0px;border-radius:12px">
        <div class="btns" style="width:95%; float: left; margin: 5% 0% 0% 3%; text-align:center;">
            <div class="button vhire" style="float: left; padding: 7px 25px 7px 0px; width:25%;">
                <img src="{{url('images/booking.png')}}" style="position: relative;left:12%;top:2px;height:15px;float:left;" />
                <img src="{{url('images/booking1.png')}}" style="position: relative;left:0%;top:7px;height:15px;float:left;" />
                ADD ACCOUNT
            </div>
            <div class="mini-btn">
                <button style="background-color: #4C15E9;">ALL</button>
                <button>ACTIVE</button>
                <button>INACTIVE</button>
            </div>
        </div>
        <center>
            <table class="table new black" cellspacing="0" cellpadding="0" style="margin:0%; border-collapse: separate;border-spacing: 0px 25px;">
                <tr style="background-color: #0F0645;color:white;">
                    <th>ACCOUNT ID</th>
                    <th>EMAIL</th>
                    <th style="font-size: 14px;">CONTACT NUMBER</th>
                    <th>STATUS</th>
                    <th style="border-radius: 0px 12px 12px 0px;"></th>
                </tr>

                @foreach ($admin as $admin_acc)
                <tr class="sc">
                    <td class="id">{{$admin_acc->adminID}}</td>
                    <td class="email">{{$admin_acc->Email}}</td>
                    <td class="contact">{{$admin_acc->ContactNum}}</td>
                    <td class="name" id="hidden">{{$admin_acc->Fname ." ". $admin_acc->Mname ." ". $admin_acc->Lname}}</td>
                    <td class="Mname" id="hidden">{{$admin_acc->Mname}}</td>
                    <td class="Lname" id="hidden">{{$admin_acc->Lname}}</td>
                    <td class="Username" id="hidden">{{$admin_acc->Username}}</td>
                    <td class="status" id="hidden">{{$admin_acc->status}}</td>

                    @if($admin_acc->status == 'ACTIVE')
                    <td class="active">{{$admin_acc->status}}<img src="{{url('images/active.png')}}" style="float: right;margin-right:20px" /></td>
                    @else
                    <td class="inactive">{{$admin_acc->status}}<img src="{{url('images/inactive.png')}}" style="float: right;margin-right:20px" /></td>
                    @endif
                    <td>
                        <table>
                            <tr>
                                <td type="button" data-id="{{$admin_acc->adminID}}" class="update" style="cursor: pointer;"><img src="{{url('images/edit.png')}}" /></td>
                               
                                <td type="button" data-admin-id="{{$admin_acc->adminID}}" class="del-scheds" style="cursor: pointer;"><img src="{{url('images/delete-dark.png')}}" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endforeach
            </table>
        </center>
    </div>
</div>

<!-- Update Modal Here -->
<div id="edit-vhire" class="modal">
    <!-- Modal content -->
    <div class="modal-content dark" style="height: 600px; margin-top:-5%; padding:0px">
        <img src="{{url('images/modal.png')}}" style="width:100%;height: 250px; object-fit:cover;object-position: 0 20%;border-radius:12px 12px 0px 0px">
        <span class="close" style="position: absolute;top:5%; right:27%; color:black">&times;</span>
        <div class="vhire-form" id="modal-book" style="margin-left: 4%; margin-top:auto">
            
            <form id="update-form" action="update" method="POST">
                @csrf
                <div class="form-left">
                    <input type="hidden" name="a_adminID" id="a_adminID"/>
                    <label>EMAIL</label><br>
                    <input name="a_Email" id="a_Email" type="email" value="{{ old('a_Email')  }}" @error('a_Email') placeholder="{{$message}}" @enderror />

                    <br><br>
                    <label>PASSWORD</label><br>
                    <input name="a_Password"  id="a_Password" type="password" value="{{ old('a_Password') }}"  @error('a_Password')  placeholder="{{$message}}" @enderror/><br><br>

                    <label>TERMINAL</label>
                    <select name="a_Terminal" id="a_Terminal" @error('a_Terminal')  placeholder="{{$message}}" @enderror>

                    @foreach ($terminals as $terminal)  
                        <option value="{{$terminal->terminalID}}">{{$terminal->terminalID}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-right">
                    <label>NAME</label><br>
                    <input name="a_Name" id="a_Name" type="text " value="{{ old('a_Name') }}" placeholder="Enter Complete Name" @error('a_Name') placeholder="{{$message}}" @enderror/>
                    <br><br>
                    <label>PHONE NUMBER</label><br>
                    <input name="a_ContactNum" id="a_ContactNum" type="tel" value="{{ old('a_ContactNum') }}" @error('a_ContactNum') placeholder="{{$message}}" @enderror /><br><br>
                    <label>STATUS</label><br>
                    <select name="a_status" id="a_status" @error('a_status')  placeholder="{{$message}}" @enderror>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                    </select>

                </div>
            </form>
            <div class="confirm" style="float: left;width:90%;margin-left:30px;margin-top:5%">
                <button type="submit" form="update-form" style="background-color: #27C124">SAVE</button>
                <button class="exit-modal" style="background-color: #FFA800; float:right;">CANCEL</button>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="add-vhire" class="modal">

    <!-- Modal content -->
    <div class="modal-content dark" style="height: 600px; margin-top:-5%; padding:0px">
        <img src="{{url('images/modal.png')}}" style="width:100%;height: 250px; object-fit:cover;object-position: 0 20%;border-radius:12px 12px 0px 0px">
        <span class="close" style="position: absolute;top:5%; right:27%; color:black">&times;</span>
        <div class="vhire-form" id="modal-book" style="margin-left: 4%; margin-top:auto">
            <form action="add_account" method="POST">
                @csrf
                <div class="form-left">
                    <label>EMAIL</label><br>
                    <input name="Email" id="Email" type="email" value="{{ old('Email') }}" @error('Email') placeholder="{{$message}}" @enderror />

                    <br><br>
                    <label>PASSWORD</label><br>
                    <input name="Password"  id="Password" type="password" value="{{ old('Password') }}"  @error('Password')  placeholder="{{$message}}" @enderror/><br><br>

                    <label>TERMINAL</label>
                    <select name="Terminal" id="Terminal" @error('Terminal')  placeholder="{{$message}}" @enderror>

                    @foreach ($terminals as $terminal)  
                        <option value="{{$terminal->terminalID}}">{{$terminal->terminalID}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-right">
                    <label>NAME</label><br>
                    <input name="Name" id="Name" type="text " value="{{ old('Name') }}" placeholder="Enter Complete Name" @error('Name') placeholder="{{$message}}" @enderror/>
                    <br><br>
                    <label>PHONE NUMBER</label><br>
                    <input name="ContactNum" id="ContactNum" type="tel" value="{{ old('ContactNum') }}" @error('ContactNum') placeholder="{{$message}}" @enderror />
                </div>
                <div class="confirm" style="float: left;width:90%;margin-left:30px;margin-top:5%">
                    <button type="submit" style="background-color: #27C124">SAVE</button>
                    <button class="exit-modal" style="background-color: #FFA800; float:right;">CANCEL</button>
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
        <center>
            <h2>ARE YOU SURE YOU WANT TO<br> DELETE SELECTED ACCOUNT?</h2>
        </center>
        <div class="confirm" style="float: left;width:90%;margin-left:30px;">
            <form id="delete-form" action="deleteAcc" method="POST">
                @csrf
                <input type="hidden" id="curr-admin" name="adminID"/>
            </form>
            <button type="submit" form="delete-form" style="background-color: #27C124">YES</button>
            <button class="exit-modal" style="background-color: #FFA800; float:right;">NO</button>
        </div>
    </div>
</div>


@endsection