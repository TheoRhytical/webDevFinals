<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function AvailableRoutes(){
        // $currUser = Auth::user();
        // $route = DB::table('route')
        // ->select ('O_termID', 'D_termID')
        // ->get();

        $terminal = DB::table('terminal')
        ->select('Location_Name', 'terminalID')
        ->get();

        $route = DB::table('route')
        ->select('routeID', 'O_termID', 'D_termID', 'terminal1.Location_Name AS origin', 'terminal2.Location_Name AS destination')
        ->join('terminal AS terminal1', 'terminal1.terminalID', '=', 'route.O_termID')
        ->join('terminal AS terminal2', 'terminal2.terminalID', '=', 'route.D_termID')
        ->get();

                //to get the user has an ID property
        
        return view('user.route',['route'=>$route, 'terminal'=>$terminal]);
        //
        }
    
    public function TicketDetails(){

        $users = DB::table('vhire')
        ->select('vhire.PlateNum','terminal.Location_Name','trip.ETD','trip.ETA', 'orders.Quantity','route.Fare')
        ->leftjoin('trip', 'trip.vehicleID', '=','vhire.vehicleID')
        ->leftjoin('route', 'trip.routeID', '=','route.routeID')
        ->leftjoin('terminal','route.O_termID', '=', 'terminal.terminalID')
        ->leftjoin('orders', 'orders.orderID', '=','trip.tripID')
        ->get();
        
            // var_dump($users);
        $currUser = Auth::user(); 
        return view('user.cancel',['users' => $users]);
        }

    // public function Admin(){

    // $admin = DB::table('admin')
    // ->select('email','username')
    // ->where('status', 1)
    // ->get();

    // $adminUser = Auth::Admin(); 
    // return view('admin.account',['admin' => $admin]);

    // }



        
    public function Home(){

        $terminals = DB::table('terminal')
        ->select('terminalID', 'Location_Name')
        ->get();

        $scheds = DB::table('trip')
        ->select('ETD', 'ETA')
        ->groupby('ETD', 'ETA')
        ->get();
            
            // var_dump($users);
        $currUser = Auth::user();
        return view('user.home',['terminals' => $terminals, 'scheds' => $scheds]);
    }    


    public function Dashboard(){
        $booking = DB::table('orders')
        ->select('orders.orderID', 'orders.orderCreationDT', 'orders.tripID', 'customer.Fname', 'customer.Lname', 'orders.Status', 'terminal1.Location_Name AS origin', 'terminal2.Location_Name AS dest', 'trip.ETD', 'trip.ETA', 'vhire.vehicleID', 'vhire.PlateNum')
        ->join('customer', 'orders.customerID', '=', 'customer.customerID')
        ->join('trip', 'orders.tripID', '=', 'trip.tripID')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('terminal AS terminal1', 'route.O_termID', '=', 'terminal1.terminalID')
        ->join('terminal AS terminal2', 'route.D_termID', '=', 'terminal2.terminalID')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->get();

        $vhire = DB::table('trip')
        ->select('vhire.vehicleID', 'vhire.PlateNum', 'trip.routeID', 'trip.tripID', 'driver.Fname', 'driver.Lname')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->join('driver', 'vhire.driverID', '=', 'driver.driverID')
        ->get();

        $revenue = DB::table('orders')
        ->sum('AmountDue');

        $total = DB::table('orders')
        ->count();

        $sold = DB::table('orders')
        ->where('Status', '=', 'CONFIRMED')
        ->count();

        return view('admin.dashboard', ['booking' => $booking, 'vhire' => $vhire, 'revenue'=> $revenue, 'total'=> $total, 'sold'=> $sold]);
    }
    
    public function Schedule(){
        $trips = DB::table('trip')
        ->select('*')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->join('terminal', 'route.D_termID', '=', 'terminal.terminalID')
        ->get();

        $terms = DB::table('terminal')
        ->select('terminalID', 'Location Name')
        ->get();

        $currUser = Auth::user();
        return view('user.schedule',['trips' => $trips, 'terms' => $terms]);
    }
}
