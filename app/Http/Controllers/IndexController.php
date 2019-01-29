<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Room;
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
            
            $events = Reservation::select('description','date', 'id_room','start_hour', 'end_hour')->where('date', '=', $somedate)->get();

            return Response::json($events);
    }

}
