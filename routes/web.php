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
//never return view in route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/cancel',[PagesController::class,"TicketDetails"]);

Route::get('/AvailableRoute',[PagesController::class,"AvailableRoutes"]);

Route::get('/dashboard', function () {
    
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/custom-login', function () {
    return view('login');
});
