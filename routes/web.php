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

Route::get('/TicketDetails',[PagesController::class,"TicketDetails"]);

Route::get('/AvailableRoute',[PagesController::class,"AvailableRoutes"]);