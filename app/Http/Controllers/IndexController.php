<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;

class IndexController extends Controller
{
    public function index()
    {
        // if($request->ajax())
        // {    
            
        // };

        if (Auth::check()) {
            return redirect('/adminPanel');
        }
        else{
            return view('index');
        }
    }

    public function modalpost(Request $request)
    {
        $somedate = $request->date;
            
            $events = Reservation::select('date', 'id_room','start_hour', 'end_hour')->where('date', '=', $somedate)->get();

            // $reservations =  Reservation::select('*')->where('date', '=', $date)->get();
            
            // foreach ($events as $event) {
            //     $date[] = $event->date;
            // }
            return response(json_encode($events));
    }

    public function cobaAjax()
    {
        return view('ajaxRequest');
    }

    
    public function cobaAjaxPost()
    {
        $input = request()->all();
        return response()->json(['success' => 'Got Simple Ajax Request']);
        
    }
}
