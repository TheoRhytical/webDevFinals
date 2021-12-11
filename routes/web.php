<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Routes\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/dashboard");
});
Route::get("/home", [PagesController::class, "Home"]);
/*Route::view("route", 'user.route');*/
Route::get("/sched", [PagesController::class, "Schedule"]);
Route::get("/route", [PagesController::class, "AvailableRoutes"]);
Route::get("/cancel", [PagesController::class, "TicketDetails"]);
Route::view("/ticket", 'user.ticket');
Route::get("/book/{tripID}", [PagesController::class, "Book"]);
Route::get("/search/{routeID}", [PagesController::class, "Search"]);
//Route::view("cancel", 'user.cancel');

//Route::middleware('auth')->group(function () {
    // Add your routes here like this
  //});


//user logic
require __DIR__.'/auth.php';//this part is really important this will aunthenticate user//

    Route::get('/TicketDetails',[PagesController::class,"TicketDetails"]);

    Route::get('/AvailableRoute',[PagesController::class,"AvailableRoutes"]);

    Route::get('/dashboard', function () { 
        return view('dashboard');
    })->name('dashboard');




Route::get('/custom-login', function () {
    return view('login');
});

//admin logic
Route::get("/routes",[PagesController::class,"showterminal"]);

Route::view("dashboard", 'admin.dashboard');

Route::view("scheds", 'admin.schedule');
Route::view("bookings", 'admin.booking');
Route::view("account", 'admin.account');

Route::view("register", 'auth.register');
Route::view("admin", 'auth.login-admin');
Route::view("passenger", 'auth.login');
//Route::view("dashboard", 'admin.dashboard');
Route::get("/dashboard", [PagesController::class, "Dashboard"]);
//Route::view("/routes", 'admin.route');
Route::get("/scheds", [PagesController::class, "AdminSched"]);
//Route::view("/bookings", 'admin.booking');
Route::get("/bookings", [PagesController::class, "AdminBooking"]);
Route::view("/account", 'admin.account');

Route::view("/signup", 'auth.register');
Route::view("/admin", 'auth.login-admin');
Route::view("/passenger", 'auth.login');
