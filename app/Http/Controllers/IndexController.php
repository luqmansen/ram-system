<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;

class IndexController extends Controller
{
    public function index()
    {
        $events = Reservation::select('date', 'id_room','start_hour', 'end_hour')->get();
        // dd($events);
        foreach ($events as $event) {
            $date[] = $event->date;
        }
        // dd($date);

        if (Auth::check()) {
            return redirect('/adminPanel');
        }
        else{
            return view('index');
        }
    }
}
