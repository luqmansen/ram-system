<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use Response;

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
        $data['rooms']= Room::get()->all();
        // dd($rooms);
        return view('manageRooms',$data);
    }

    public function delete($id)
    {
        Room::where('id',$id)->delete();
        $response = 'ok';
        return Response::json($response);
    }
    public function export()
    {
        $data['rooms']=Room::get()->all();
        return view('exportRoomsTable',$data);
    }
}
