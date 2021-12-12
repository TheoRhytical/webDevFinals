<style>
    button{
        all:initial;
        width: 100%;
    }
</style>

<br><br>
<ul class="sideNav">
    <a href="/home">
        <div class="list" id="home">
            <li class="icon one">
                Home
            </li>
        </div>
    </a>
    <a href="/route">
        <div class="list" id="routes">
            <li class="icon two">
                Routes
            </li>
        </div>
    </a>
    <a href="/sched">
        <div class="list" id="sched">
            <li class="icon three">
                Schedules
            </li>
        </div>
    </a>
    <a href="/ticket">
        <div class="list" id="tic">
            <li class="icon four">
                Tickets
            </li>
        </div>
    </a>
    <br><br><br>
    <form action="/logout" method="POST">
        @csrf
    <button type="submit">
        <div class="list">
            <li class="icon five">
                Logout
            </li>
        </div>
    </button>
    </form>
    <br>
    <p class="p">Contact Us</p><br>
    <p class="p">vhire_cebu@gmail.com</p>
    <p class="p">Copyright &copy; 2020 All Rights Reserved</p>
</ul>