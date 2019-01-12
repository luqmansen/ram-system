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
        $data['rooms']= Room::orderBy('id','asc')->get()->all();
        // dd($data);
        return view('manageRooms',$data);
    }

    public function delete($id)
    {
        Room::where('id',$id)->delete();
        $response = 'ok';
        return Response::json($response);
    }
    public function deletes(Request $request)
    {
        $ids = $request->ids;
        Room::whereIn('id',explode(",",$ids))->delete();
        $response = 'ok';
        return Response::json($response);
    }
    public function exportXls()
    {
        $data['rooms']=Room::get()->all();
        return view('exportRoomsTable',$data);
    }
    public function exportPdf()
    {
        $data['rooms']=Room::get()->all();
        return view('exportRoomsDocs',$data);
    }
}
