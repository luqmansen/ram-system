<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class ManageRoomsController extends Controller
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
        $data['asd']= Room::get()->all();
        // dd($rooms);
        return view('manageRooms',$data);
    }
}
