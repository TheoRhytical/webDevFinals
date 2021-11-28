<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('css/login.css')}}" />
    <title>Vhire</title>
</head>
<body style="background-color: #4C15E9; padding: 45px; color: white; padding-top:5px">
<div class="body">
    <div class="cont">
        <form style="text-align: center;">
            <img src="{{url('images/profile.png')}}"></img>
            <div style="margin-top:30px">
                <div class="fields">
                    <label class="label">First Name</label>
                    <input type="text" placeholder="Juan"></input>
                </div>
                <div class="fields">
                    <label class="label">Last Name</label>
                    <input type="text" placeholder="Dela Cruz"></input>
                </div>
                <div class="fields">
                    <label class="label">Username</label>
                    <input type="text" placeholder="JuanDelaCruz"></input>
                </div>
                <div class="fields">
                    <label class="label">Email Address</label>
                    <input type="text" placeholder="JuanDelaCruz@email.com"></input>
                </div>
                <div class="fields">
                    <label class="label">Password</label>
                    <input type="password"></input>
                </div>
                <div class="fields">
                    <label class="label">Confirm Password</label>
                    <input type="password" placeholder="Juan"></input>
                </div>
                <div class="fields">
                    <label class="label">Phone Number</label>
                    <input type="tel"></input>
                </div>
                <div class="fields">
                    <label class="label">Date of Birth</label>
                    <input type="date"></input>
                </div>
                <button class="button">SIGN UP</button>
            </div>
        </form>
        <center><p style="color:#FFFFFF">Already have an account? <a href="/" class="link">Sign in now!</a></p></center>
    </div>
</div>
</body>
</html>