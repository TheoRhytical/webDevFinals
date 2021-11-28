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
        <h2>Schedule 1</h2>
        <h3>Origin 1 to Destination 1</h3>
        <div class="subcontainer" style="margin:0px; padding:20px">
            <div class="scheds">
                <h3>Vhire 1 (Code No.)</h3>
                <p>terminal</p>
                <p>no. of available seats</p>
                <p>fare price</p>
                <a href="book"><button></button></a>
            </div>
            <div class="scheds">
                <h3>Vhire 2 (Code No.)</h3>
                <p>terminal</p>
                <p>no. of available seats</p>
                <p>fare price</p>
                <a href="book"><button></button></a>
            </div>
            <div class="scheds">
                <h3>Vhire 3 (Code No.)</h3>
                <p>terminal</p>
                <p>no. of available seats</p>
                <p>fare price</p>
                <a href="book"><button></button></a>
            </div>
            <div class="scheds">
                <h3>Vhire 4 (Code No.)</h3>
                <p>terminal</p>
                <p>no. of available seats</p>
                <p>fare price</p>
                <a href="book"><button></button></a>
            </div>
        </div>
    </div>
</div>
@endsection