<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


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

    // // $adminUser = Auth::Admin(); 
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
        // dd($request);
        $input = $request->input();
        $rID = $input['T1']."-".$input['T2'];

        $update = DB::table('route')
            ->updateOrInsert(
                ['routeID' => $rID,'O_termID' => $input['T1'], 'D_termID' => $input['T2']],
                ['Fare' => $input['fare'], 'Trip Duration' => $input['Travel']]
            );
        // var_dump($request);
        return redirect('routes');
    
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
        //return $currUser;
        return view('user.home',['terminals' => $terminals, 'scheds' => $scheds]);
    }    


    public function Dashboard(){
        $booking = DB::table('orders')
        ->select('orders.orderID', 'orders.orderCreationDT', 'orders.tripID', 'users.username', 'orders.Status', 'terminal1.Location_Name AS origin', 'terminal2.Location_Name AS dest', 'trip.ETD', 'trip.ETA', 'vhire.vehicleID', 'vhire.PlateNum')
        ->join('users', 'orders.customerID', '=', 'users.userID')
        ->join('trip', 'orders.tripID', '=', 'trip.tripID')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('terminal AS terminal1', 'route.O_termID', '=', 'terminal1.terminalID')
        ->join('terminal AS terminal2', 'route.D_termID', '=', 'terminal2.terminalID')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->get();

        $vhire = DB::table('trip')
        ->select('vhire.vehicleID', 'vhire.PlateNum', 'trip.routeID', 'trip.tripID', 'users.username')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->join('users', 'vhire.driverID', '=', 'users.userID')
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
        ->select('trip.vehicleID', 'vhire.PlateNum', 'terminal.terminalID', 'terminal.Location_Name', 'trip.ETD', 'trip.ETA', 'trip.routeID', 'trip.FreeSeats', 'route.Fare', 'trip.tripID')
        ->leftjoin('route', 'trip.routeID', '=','route.routeID')
        ->leftjoin('vhire', 'trip.vehicleID', '=','vhire.vehicleID')
        ->leftjoin('terminal', 'route.O_termID', '=','terminal.terminalID')
        ->where('tripID', $tripID)
        ->get();

        return view('user.book',['info' => $infos->first()]);
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

        if(isset($trips->first()->routeID))return view('user.search',['trips' => $trips]);
        else return Redirect::back()->with('msg', 'No trip exists with such route and time. Please try again.');
    }

    public function AdminSched(){
        $vhires = DB::table('trip')
        ->select('vhire.PlateNum', 'route.routeID', 'trip.ETD', 'trip.ETA','trip.FreeSeats', 'users.username', 'trip.Status', 'vhire.Capacity')
        ->join('route', 'trip.routeID', '=', 'route.routeID')
        ->join('vhire', 'trip.vehicleID', '=', 'vhire.vehicleID')
        ->join('terminal', 'route.D_termID', '=', 'terminal.terminalID')
        ->join('users', 'vhire.driverID', '=', 'users.userID')
        ->get();

        $routes = DB::table('route')
        ->select('*')
        ->get();

        $drivers = DB::table('users')
        ->select('*')
        ->where('role', '=', 'DRIVER')
        ->get();
        return view('admin.schedule',['vhires' => $vhires, 'routes' => $routes, 'drivers' => $drivers]);
    }

    public function AdminBooking(){
        $book = DB::table('orders')
        ->select('users.username', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('users', 'users.userID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->get();

        $confirmed = DB::table('orders')
        ->select('users.username', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('users', 'users.userID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->where('orders.Status', '=', 'CONFIRMED')
        ->get();

        $pending = DB::table('orders')
        ->select('users.username', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('users', 'users.userID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->where('orders.Status', '=', 'PENDING')
        ->get();

        $cancelled = DB::table('orders')
        ->select('users.username', 'orders.orderCreationDT', 'trip.routeID', 'orders.Status')
        ->join('users', 'users.userID', '=', 'orders.customerID')
        ->join('trip', 'trip.tripID', '=', 'orders.tripID')
        ->where('orders.Status', '=', 'CANCELLED')
        ->get();

        $trips = DB::table('trip')
        ->select('*')
        ->get();

        $passenger = DB::table('users')
        ->select('*')
        ->where('role', '=', 'CUSTOMER')
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
        ->where('customerID', $currUser->userID)
        ->where('orders.Status', '!=','CANCELLED')
        ->get();

        return view('user.ticket',['orders' => $orders]);
    }


    public function UpdateAcc(Request $request){
        // validate
        $this->validate($request,[
            'a_Username' =>'required|max:255',
            'a_Email' =>'required|max:255|email',
            'a_ContactNum' => 'required|max:255',
            // 'a_Password' => 'required'
        ]);

        DB::table('users')->where('userID', '=', $request->a_adminID)->update([
            'email'      => $request->a_Email,
            'contactNum' => $request->a_ContactNum,
            'username'   => $request->a_Username,  
            'password'  => Hash::make($request->a_Password),
            'status'     => $request->a_status,
        ]);
        
        return redirect()->route('account');
    }


    public function deleteAdminAcc(Request $request){
        //delete
        DB::table('users')->where('userID', '=', $request->adminID)->delete();
        //redirect to account
        return redirect()->route('account');
    }


    public function AddAdmin(){
        $admin = DB::table('users')
        ->select('*')
        ->where('role','=','ADMIN')
        ->get();

        $terminal = DB::table('terminal')
        ->select('*')
        ->get();

        $active =  DB::table('users')
        ->select('*')
        ->where('status', '=','ACTIVE')
        ->where('role', '=','ADMIN')
        ->get();

        $inactive =  DB::table('users')
        ->select('*')
        ->where('status', '=','INACTIVE')
        ->where('role', '=','ADMIN')
        ->get();

        // $adminUser = Auth::Admin(); 
        return view('admin.account',['admin' => $admin,'terminals'=>$terminal,'actives' => $active, 'inactives' => $inactive]);
    }

    public function AddAcc(Request $request){
        //validate
        $this->validate($request,[
            'Username' =>'required|max:255',
            'Email' =>'required|max:255|email',
            'ContactNum' => 'required|max:255',
            'Password' => 'required'
        ]);


        //insert in database
        DB::table('users')->insert([
            'email' => $request->Email,
            'contactNum' => $request->ContactNum,
            'username' => $request->Username,  
            'password' => Hash::make($request->Password),
            'status' => 'ACTIVE',
            'role' => 'ADMIN',
        ]);

        //redirect
        return redirect()->route('account');
    }
}
