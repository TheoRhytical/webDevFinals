<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin.dashboard');
});
Route::view("home", 'user.home');
Route::view("route", 'user.route');
Route::view("sched", 'user.schedule');
Route::view("ticket", 'user.ticket');
Route::view("book", 'user.book');
Route::view("cancel", 'user.cancel');

Route::view("dashboard", 'admin.dashboard');
Route::view("routes", 'admin.route');
Route::view("scheds", 'admin.schedule');
Route::view("bookings", 'admin.booking');
Route::view("account", 'admin.account');