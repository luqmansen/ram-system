<?php

namespace App\Http\Controllers;
use App\Room;
use Carbon\Carbon;
use App\Reservation;
use DB;

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

        $room = Room::select('id', 'room_name', 'table_capacity','chair_capacity')->get();
        // $room = Room::all(['id', 'room_name','table_capacity','chair_capacity']);
        // dd($room[0]->id);
        
        
        return view('hoobla')->with('room', $room) ;
    }
}
