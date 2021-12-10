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
    return view('admin.route');
});
Route::get("home", [PagesController::class, "Home"]);
<<<<<<< HEAD
/*Route::view("route", 'user.route');*/
Route::get("sched", [PagesController::class, "Schedule"]);
=======
Route::get("route", [PagesController::class, "AvailableRoutes"]);
Route::get("cancel", [PagesController::class, "TicketDetails"]);
Route::view("sched", 'user.schedule');
>>>>>>> 486283c91d19b5e093b5d8d55d9d0995724cad50
Route::view("ticket", 'user.ticket');
Route::view("book", 'user.book');
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
Route::get("dashboard", [PagesController::class, "Dashboard"]);
Route::view("routes", 'admin.route');
Route::view("scheds", 'admin.schedule');
Route::view("bookings", 'admin.booking');
Route::view("account", 'admin.account');

Route::view("register", 'user.signup');
Route::view("admin", 'auth.login-admin');
Route::view("passenger", 'auth.login');