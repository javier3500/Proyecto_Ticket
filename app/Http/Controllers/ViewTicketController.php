<?php

namespace App\Http\Controllers;


use App\Models\ticket;
use App\Models\view_ticket;
use Illuminate\Http\Request;

class ViewTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrar()
    {
        $datos = ticket::all();
        return view('view_ticket/view_ticket',compact('datos'));
    }

}
