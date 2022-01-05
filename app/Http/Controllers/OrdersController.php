<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\Trip;


class OrdersController extends Controller
{
    public function book(Request $request){
        $currUser = Auth::user();

        $trip = Trip::find($request->input('tripID'));
        $trip->FreeSeats -= $request->input('quantity');
        $trip->save();

        Orders::insert([
            'tripID' => $request->input('tripID'),
            'customerID' => $currUser->userID,
            'Quantity' => $request->input('quantity'),
            'AmountDue' => $request->input('Total'),
        ]);

        return redirect('/ticket');
    }
    public function cancel(Request $request){

        $order = Orders::find($request->input('orderID'));
        $order->Status = 'CANCELLED';
        $order->statusChangeDT = now();
        $order->save();
        
        $trip = Trip::find($order->tripID);
        $trip->FreeSeats += $order->Quantity;
        $trip->save();

        return redirect('/ticket');
    }
    public function confirm($orderID){
        $query = DB::table('orders')
            ->where('orderID', $orderID)
            ->update([
                'Status' => 'CONFIRMED', 
                'statusChangeDT' => now()
            ]);

        return redirect('/close');
    }
}
