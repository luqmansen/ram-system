<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Room;
use App\Reservation;
use Response;
use DB;
use PDF;

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
        $date = Carbon::now('Asia/Jakarta')->format("Y-m-d");
        $datas = Reservation::whereRaw('STATUS in ("active", "pending")')->get();
        foreach ($datas as $data){
            if($data->date < $date && $data->status == 'active'){
                $data->status = "completed";
                $data->save();
            }
            if ($data->date < $date && $data->status == 'pending') {
                $data->status = "cancelled";
                $data->save();
            }
        }

        $data['rooms']= Room::orderBy('id','asc')->get()->all();
        // dd($data);
        return view('manageRooms',$data);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
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
        $pdf = PDF::loadView('exportRoomsDocs',$data);
        return $pdf->download('RoomsTable.pdf');
        // return view('exportRoomsDocs',$data);
    }
    public function edit(Request $request){
        $id = $request->id;
        $name = $request->name;
        $table_capacity = $request->table_capacity;
        $chair_capacity = $request->chair_capacity;
        
        $room = Room::find($request->id);

        $room->room_name = $name;
        $room->table_capacity = $table_capacity;
        $room->chair_capacity = $chair_capacity;

        $room->save();
        $response = 'ok';
        return Response::json($response);
    }
    public function add(Request $request){
        $name = $request->name;
        $table_capacity = $request->table_capacity;
        $chair_capacity = $request->chair_capacity;
        
        $room = new Room;

        $room->room_name = $name;
        $room->table_capacity = $table_capacity;
        $room->chair_capacity = $chair_capacity;

        $room->save();

        $data['id'] = Room::where('room_name',$request->name)->first();
        $response = $data['id']->id;
        return Response::json($response);
    }
}
