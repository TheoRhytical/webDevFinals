<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function AvailableRoutes(){
        // $currUser = Auth::user();
        $route = DB::table('route')
        ->select ('O_termID', 'D_termID')
        ->get();

                //to get the user has an ID property
        
        return view('user.route',['route'=>$route]);
        //
        }
    
    public function TicketDetails(){

        $users = DB::table('vhire')
        ->select('vhire.PlateNum','terminal.Location Name','trip.ETD','trip.ETA', 'orders.Quantity','route.Fare')
        ->leftjoin('trip', 'trip.vehicleID', '=','vhire.vehicleID')
        ->leftjoin('route', 'trip.routeID', '=','route.routeID')
        ->leftjoin('terminal','route.O_termID', '=', 'terminal.terminalID')
        ->leftjoin('orders', 'orders.orderID', '=','trip.tripID')
        ->get();
        
            // var_dump($users);
        $currUser = Auth::user(); 
        return view('user.cancel',['users' => $users]);
        }
        
    public function Home(){

        $terminals = DB::table('terminal')
        ->select('terminalID', 'Location Name')
        ->get();

        $scheds = DB::table('trip')
        ->select('ETD', 'ETA')
        ->groupby('ETD', 'ETA')
        ->get();
            
            // var_dump($users);
        $currUser = Auth::user();
        return view('user.home',['terminals' => $terminals, 'scheds' => $scheds]);
    } 

    public function Book($tripID){
        $info = DB::table('trip')
        ->select('trip.vehicleID', 'vhire.PlateNum', 'terminal.terminalID', 'terminal.Location Name', 'trip.ETD', 'trip.ETA', 'trip.routeID', 'route.Fare', 'trip.tripID')
        ->leftjoin('route', 'trip.routeID', '=','route.routeID')
        ->leftjoin('vhire', 'trip.vehicleID', '=','vhire.vehicleID')
        ->leftjoin('terminal', 'route.O_termID', '=','terminal.terminalID')
        ->where('tripID', $tripID)
        ->get();

        $currUser = Auth::user();
        return view('user.book',['info' => $info, 'currUser' => $currUser]);
    }  
}
