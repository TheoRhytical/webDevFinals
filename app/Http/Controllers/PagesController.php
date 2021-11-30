<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function AvailableRoutes(){
        return view('pages.availroute');
    }

    public function TicketDetails(){
        return view('pages.ticketdet');
    }

}
