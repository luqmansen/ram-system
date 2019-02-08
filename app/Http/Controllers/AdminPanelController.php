<?php

namespace App\Http\Controllers;
use App\Room;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
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

    public function index(){
        $room = Room::select('id', 'room_name', 'table_capacity','chair_capacity')->get();
        // $room = Room::all(['id', 'room_name','table_capacity','chair_capacity']);
        // dd($room[0]->id);
        
        
        return view('adminPanel')->with('room', $room) ;
    }
}
