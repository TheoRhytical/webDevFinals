<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OrdersController;
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


Route::middleware('auth')->group(function () {
    Route::get("/home", [PagesController::class, "Home"]);
    Route::get("/sched", [PagesController::class, "Schedule"]);
    //Route::get("/route", [PagesController::class, "AvailableRoutes"]);
    Route::get("/ticket", [PagesController::class, "Ticket"]);
    Route::post("/search", [PagesController::class, "Search"]);
    Route::post("/HomeSearch", [PagesController::class, "HomeSearch"]);
    Route::post("/book", [PagesController::class, "Book"]);
    Route::post("/BookingAction", [OrdersController::class, "book"]);
    Route::post("/cancel", [OrdersController::class, "cancel"]);
});


//user logic
require __DIR__.'/auth.php';//this part is really important this will aunthenticate user//

    Route::post('/TicketDetails',[PagesController::class,"TicketDetails"]);
    Route::get('/dashboard', function () { 
        return view('dashboard');
    })->name('dashboard');




Route::get('/custom-login', function () {
    return view('login');
});

//admin logic


Route::get("/routes",[PagesController::class,"showterminal"]);
Route::resource('route', RouterController::class);
// Route::post("/routes",[PagesController::class,"condition"])->name('add.routes');;
Route::view("dashboard", 'admin.dashboard');

Route::view("scheds", 'admin.schedule');
Route::view("bookings", 'admin.booking');
Route::view("account", 'admin.account');

// Route::view("register", 'auth.register');
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
