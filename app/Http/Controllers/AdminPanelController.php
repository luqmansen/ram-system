<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Room;
use Carbon\Carbon;
use App\Reservation;
use DB;
use Session;

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

        if(Session::has('registration_step')){
            Session::forget('registration_step');
        }
        Session::put('registration_step', 1);
        // $room = Room::select('id', 'room_name', 'table_capacity','chair_capacity')->get();
        $room = Room::all(['id', 'room_name','table_capacity','chair_capacity']);
        // dd($room);
            return view('adminPanel')->with('room',$room);
    }
}
