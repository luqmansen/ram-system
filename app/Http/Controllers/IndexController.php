<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Room;
use Carbon\Carbon;
use Session;
use App\Reservation;
use DB;
use Response;

class IndexController extends Controller
{
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

        if(Session::has('registration_step')){
            Session::forget('registration_step');
        }
        Session::put('registration_step', 1);
        // $room = Room::select('id', 'room_name', 'table_capacity','chair_capacity')->get();
        $room = Room::all(['id', 'room_name','table_capacity','chair_capacity']);
        // dd($room);
        if (Auth::check()) {
            return redirect('/adminPanel')->with('room',$room);
        }
        else{
            return view('index')->with('room', $room);
        }
    }

    public function modalpost(Request $request)
    {
        $somedate = $request->date;
        
        // $events = Reservation::select('description','date', 'id_room','start_hour', 'end_hour')->where('date', '=', $somedate)->get();
        $events = DB::table('reservations')
                        ->where('reservations.date','=', $somedate)
                        ->whereRaw('STATUS in ("active", "pending")')
                        ->select('rooms.room_name','reservations.date', 'reservations.id_room','reservations.start_hour', 'reservations.end_hour')
                        ->join('rooms', 'reservations.id_room', '=', 'rooms.id')
                        ->get();
        // dd($jointable);
        return Response::json($events);
    }

    public function getDate(Request $request)
    {
        $day = Crypt::encrypt($request->day);
        $month = Crypt::encrypt($request->month);
        $year = Crypt::encrypt($request->year);
        $room = Crypt::encrypt($request->room);

        $date = array($day,$month,$year,$room);

        return Response::json($date);
    }

}
