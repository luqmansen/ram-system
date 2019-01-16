<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use DB;

class HistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['history']= Reservation::get()->all();
        $data['history'] = DB::table('reservations')
                ->join('rooms', 'reservations.id_room','=','rooms.id')
                ->join('customers','reservations.id_customer','=','customers.id')
                ->get()->all();
        // dd($data);
        return view('history', $data);
    }
}