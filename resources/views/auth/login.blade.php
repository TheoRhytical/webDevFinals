<x-guest-layout>
    <section style="background-color: #4C15E9; padding: 45px; color: white; padding-top:5px">
        
        <div class="cont">
            <div style="overflow:auto; width:75%; position:relative; left:13%">
                <img src="{{url('images/trans_logo.png')}}" style="left: 50%;" class="logo"></img>
                <center><h3 class="h">Book Now!</h3></center>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}" class="login">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="label">Username</label><br>

                        <input id="email" type="email" placeholder="juandelacruz@email.com" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="label">Password</label><br>

                        <x-input id="password" placeholder="juandelacruz"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="checkbox">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <label class="label" style="padding-top:5px">Remember Me</label>


                        <a style="float:right; padding-top:5px" class="link" href="{{ route('password.request') }}">Forgot Password?</a><br></br>
                    </div>

                    <input type="submit" value="SIGN IN">


                </form>

                <center><p style="color:#FFFFFF">Don't have an account?&nbsp;<a class="link">Create Now!</a></p></center>
            
                <center><a class="link">www.vhire.ph</a><br></br></center>
                <center><p style="margin-top:0px">&copy; 2021 vhire.cebu.ph. All Rights Reserved.</p></center>
    
            </div>
        </div>
        
    </section>
</x-guest-layout>
