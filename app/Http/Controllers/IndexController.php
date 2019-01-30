<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Room;
use DB;
use Response;

class IndexController extends Controller
{
    public function index()
    {
        $room = Room::select('id', 'name', 'table_capacity','chair_capacity')->get();
        $room = Room::all(['id', 'name','table_capacity','chair_capacity']);
        // dd($room[0]->id);
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
                        ->select('rooms.name','reservations.date', 'reservations.id_room','reservations.start_hour', 'reservations.end_hour')
                        ->join('rooms', 'reservations.id_room', '=', 'rooms.id')
                        ->get();
        // dd($jointable);
        return Response::json($events);
    }

}
