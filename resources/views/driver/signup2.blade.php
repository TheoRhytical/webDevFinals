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
                    <label class="label">Date of Vehicle Registration</label>
                    <input type="date"></input>
                </div>
                <div class="fields">
                    <label class="label">License No.</label>
                    <input type="text" placeholder="123456789"></input>
                </div>
                <div class="fields">
                    <label class="label">Date of License Expiry</label>
                    <input type="date"></input>
                </div>
                <div class="fields">
                    <label class="label">Date of Vehicle Registration Expiry</label>
                    <input type="date"></input>
                </div>
                <div class="sub">
                    <h5>VEHICLE DETAILS</h5>
                    <div class="fields">
                        <label class="label" style="padding-left:0px">Brand</label>
                        <input type="text" style="float:left" placeholder="Brand of Car"></input>
                    </div>
                    <div class="fields">
                        <label class="label" style="padding-left:0px">Model</label>
                        <input type="text" style="float:left" placeholder="Model of Car"></input>
                    </div>
                    <div class="fields">
                        <label class="label" style="padding-left:0px">OR/CR Number</label>
                        <input type="text" style="float:left" placeholder="1234567890"></input>
                    </div>
                    <div class="fields">
                        <label class="label" style="padding-left:0px">Plate Number</label>
                        <input type="text" style="float:left" placeholder="1234567890"></input>
                    </div>
                </div>
                <div class="sub" style="float:right; padding-left:0px">
                    <h5 style="padding-left:15px">PLEASE UPLOAD THE FOLLOWING:</h5>
                    <label class="label" style="padding-left:15px">Driver's License</label>
                    <input type="file" id="license"style="display:none"></input>
                    <label class="uploads" for="license" style="padding-left:15px">Upload<img src="{{url('images/upload.png')}}"></img></label>
                    <br><br>
                    <label class="label" style="padding-left:15px">Vehicle Image
                    <div class="grey">
                        <img src="{{url('images/info.png')}}"></img>
                    </div>
                    </label>
                    <input type="file" id="vimage" style="display:none"></input>
                    <label class="uploads" for="vimage" style="padding-left:15px">Upload<img src="{{url('images/upload.png')}}"></img></label>
                    <br><br>
                    <label class="label" style="padding-left:15px">OR/CR</label>
                    <input type="file" id="orcr" style="display:none"></input>
                    <label class="uploads" for="orcr" style="padding-left:15px">Upload<img src="{{url('images/upload.png')}}"></img></label>
                </div>
                <button class="button">SIGN UP</button>
            </div>
        </form>
        <center><p style="color:#FFFFFF">Already have an account? <a href="/" class="link">Sign in now!</a></p></center>
    </div>
</div>
</body>
</html>