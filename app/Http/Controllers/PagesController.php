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

        $route = DB::table('trip')
        ->select ('O_termID', 'D_termID', 'Fare')
        ->select('route.routeID', 'O_termID', 'D_termID', 'terminal1.Location_Name AS origin', 'terminal2.Location_Name AS destination')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('terminal AS terminal1', 'terminal1.terminalID', '=', 'route.O_termID')
        ->join('terminal AS terminal2', 'terminal2.terminalID', '=', 'route.D_termID')
        ->get();
        
        return view('user.route',['route'=>$route, 'terminal'=>$terminal]);
        //
        }
    
    public function TicketDetails(Request $request){

        $users = DB::table('orders')
        ->select('vhire.PlateNum','vhire.vehicleID','terminal.Location_Name','trip.ETD','trip.ETA', 'orders.Quantity','route.Fare', 'orders.orderID', 'orders.Date', 'trip.tripID')
        ->leftjoin('trip', 'orders.tripID', '=','trip.tripID')
        ->leftjoin('route', 'trip.routeID', '=','route.routeID')
        ->leftjoin('terminal','route.O_termID', '=', 'terminal.terminalID')
        ->leftjoin('vhire', 'vhire.vehicleID', '=','trip.vehicleID')
        ->where('orders.orderID', $request->input('orderID'))
        ->get();
        
            // var_dump($users);
        $currUser = Auth::user();

        return view('user.cancel',['users' => $users->first()]);
    }

    // public function Admin(){

    // $admin = DB::table('admin')
    // ->select('email','username')
    // ->where('status', 1)
    // ->get();

    // $adminUser = Auth::Admin(); 
    // return view('admin.account',['admin' => $admin]);

    // }
    // Public function delete()

    public function showterminal(){
        // $currUser = Auth::user();
        $rname = DB::table('route')
        ->select ('O_termID', 'D_termID', 'Fare')
        ->get();

                //to get the user has an ID property
        
        // var_dump($rname);
        // return view('user.route',['route'=>$route]);
        return view('admin.route',['rname'=>$rname]);
        }    

    public function condition(Request $request){

        var_dump($request);
        
    }


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
        //return $currUser;
        return view('user.home',['terminals' => $terminals, 'scheds' => $scheds, 'currUser' => $currUser]);
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
        ->select('terminalID', 'Location_Name')
        ->get();

        return view('user.schedule',['trips' => $trips, 'terms' => $terms]);
    }
    public function Book(Request $request){
        $tripID = $request->input('tripID');
        $infos = DB::table('trip')
        ->select('trip.vehicleID', 'vhire.PlateNum', 'terminal.terminalID', 'terminal.Location_Name', 'trip.ETD', 'trip.ETA', 'trip.routeID', 'route.Fare', 'trip.tripID')
        ->leftjoin('route', 'trip.routeID', '=','route.routeID')
        ->leftjoin('vhire', 'trip.vehicleID', '=','vhire.vehicleID')
        ->leftjoin('terminal', 'route.O_termID', '=','terminal.terminalID')
        ->where('tripID', $tripID)
        ->get();

        $currUser = Auth::user();

        return view('user.book',['infos' => $infos, 'currUser' => $currUser]);
    }
    
    public function Search(Request $request){
        $routeID = $request->input('routeID');

        $trips = DB::table('trip')
        ->select('*')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->join('terminal', 'route.D_termID', '=', 'terminal.terminalID')
        ->where('trip.routeID', $routeID)
        ->get();

        return view('user.search',['trips' => $trips]);
    }

    public function HomeSearch(Request $request){
        $targetETD = date('h:i', strtotime(substr($request->input('time'), 0, 5)));
        $O_term = $request->input('O_term');
        $D_term = $request->input('D_term');

        $trips = DB::table('trip')
        ->select('*')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->join('terminal as D_term', 'route.D_termID', '=', 'D_term.terminalID')
        ->join('terminal as O_term', 'route.O_termID', '=', 'O_term.terminalID')
        ->where('ETD', $targetETD)
        ->where('D_term.Location_Name', $D_term)
        ->where('O_term.Location_Name', $O_term)
        ->get();

        return view('user.search',['trips' => $trips]);
    }

    public function AdminSched(){
        $vhires = DB::table('trip')
        ->select('vhire.PlateNum', 'route.routeID', 'trip.ETD', 'trip.ETA', 'driver.Fname', 'driver.Lname', 'trip.Status', 'vhire.Capacity')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->join('terminal', 'route.D_termID', '=', 'terminal.terminalID')
        ->join('driver', 'vhire.driverID', '=', 'driver.driverID')
        ->get();

        return view('admin.schedule',['vhires' => $vhires]);
    }

    public function AdminBooking(){
        $book = DB::table('orders')
        ->select('customer.Fname', 'customer.Lname', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('customer', 'customer.customerID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->get();

        $confirmed = DB::table('orders')
        ->select('customer.Fname', 'customer.Lname', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('customer', 'customer.customerID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->where('orders.Status', '=', 'CONFIRMED')
        ->get();

        $pending = DB::table('orders')
        ->select('customer.Fname', 'customer.Lname', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('customer', 'customer.customerID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->where('orders.Status', '=', 'PENDING')
        ->get();

        $cancelled = DB::table('orders')
        ->select('customer.Fname', 'customer.Lname', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('customer', 'customer.customerID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->where('orders.Status', '=', 'CANCELLED')
        ->get();

        $trips = DB::table('trip')
        ->select('*')
        ->get();

        $passenger = DB::table('customer')
        ->select('*')
        ->get();
        return view('admin.booking', ['book' => $book, 'confirmed' => $confirmed, 'pending' => $pending, 'cancelled' => $cancelled, 'trips' => $trips, 'passenger' => $passenger]);
    }
    public function Ticket(){
        $currUser = Auth::user();

        $orders = DB::table('orders')
        ->select(
            'O_term.Location_Name as O_Loc', 
            'D_term.Location_Name as D_Loc',
            'trip.ETD',
            'trip.ETA',
            'orders.Date',
            'orders.Quantity',
            'route.Fare',
            'orders.orderID'
            )
        ->join ('trip', 'orders.tripID', '=', 'trip.tripID')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('terminal as O_term', 'route.O_termID', '=', 'O_term.terminalID')
        ->join('terminal as D_term', 'route.D_termID', '=', 'D_term.terminalID')
        ->where('customerID', $currUser->customerID)
        ->where('orders.Status', '!=','CANCELLED')
        ->get();

        return view('user.ticket',['orders' => $orders]);
    }
}
