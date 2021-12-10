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
    return redirect("/home");
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



require __DIR__.'/auth.php';

 Route::get('/TicketDetails',[PagesController::class,"TicketDetails"]);

    Route::get('/AvailableRoute',[PagesController::class,"AvailableRoutes"]);

    Route::get('/dashboard', function () { 
        return view('dashboard');
    })->name('dashboard');




Route::get('/custom-login', function () {
    return view('login');
});
//Route::view("dashboard", 'admin.dashboard');
Route::get("/dashboard", [PagesController::class, "Dashboard"]);
Route::view("/routes", 'admin.route');
Route::get("/scheds", [PagesController::class, "AdminSched"]);
Route::view("/bookings", 'admin.booking');
Route::view("/account", 'admin.account');

Route::view("register", 'user.signup');
Route::view("admin", 'auth.login-admin');
Route::view("passenger", 'auth.login');