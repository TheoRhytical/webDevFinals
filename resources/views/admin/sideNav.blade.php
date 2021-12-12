
<br><br>
<ul class="sideNav scrolly">
    <center><p style="font-weight: bold;">WELCOME ADMIN</p></center>
    <a href="dashboard">
        <div class="list" id="dashboard">
            <li class="icon one">
                Dashboard
            </li>
        </div>
    </a>
    <a href="routes">
        <div class="list" id="routes">
            <li class="icon two">
                Routes
            </li>
        </div>
    </a>
    <a href="scheds">
        <div class="list" id="scheds">
            <li class="icon three">
                Schedules
            </li>
        </div>
    </a>
    <a href="bookings">
        <div class="list" id="book">
            <li class="icon four">
                Bookings
            </li>
        </div>
    </a>
    <a href="account">
        <div class="list" id="acc">
            <li class="icon six">
                Create Account
            </li>
        </div>
    </a>
    <br><br><br>
    <form action="/logout" method="POST">
        @csrf
    <button type="submit" style="all: initial; width: 100%; cursor: pointer">
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