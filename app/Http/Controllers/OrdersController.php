<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{
    public function book(Request $request){
        $currUser = Auth::user();
        $query = DB::table('orders')->insert([
            'tripID' => $request->input('tripID'),
            'customerID' => $request->input('userID'),
            'Quantity' => $request->input('quantity')
        ]);

        return redirect('/ticket');
    }
    public function cancel(Request $request){
        $query = DB::table('orders')
            ->where('orderID', $request->input('orderID'))
            ->update(['Status' => 'CANCELLED']);

        return redirect('/ticket');
    }
    public function confirm(Request $request){
        $query = DB::table('orders')
            ->where('orderID', $request->input('orderID'))
            ->update(['Status' => 'CONFIRMED']);

        return redirect('/bookings');
    }
}
