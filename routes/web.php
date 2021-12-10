<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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
    return view('auth.login');
});
Route::get("home", [PagesController::class, "Home"]);
/*Route::view("route", 'user.route');*/
Route::view("sched", 'user.schedule');
Route::view("ticket", 'user.ticket');
Route::get("book/{tripID}", [PagesController::class, "Book"]);
/*Route::view("cancel", 'user.cancel');*/

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
Route::view("dashboard", 'admin.dashboard');
Route::view("routes", 'admin.route');
Route::view("scheds", 'admin.schedule');
Route::view("bookings", 'admin.booking');
Route::view("account", 'admin.account');

Route::view("register", 'auth.register');
Route::view("admin", 'auth.login-admin');
Route::view("passenger", 'auth.login');