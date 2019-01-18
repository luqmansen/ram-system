<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class CalendarController extends Controller
{
    public function index()
    { 

        //fungsi untuk return array untuk restriction di date`
        $restriction =  Reservation::select('*')->get();

            $rest = array();
            
            foreach ($restriction as $row)
            {
                $dat = $row->date;
                $rest[] =$dat;
            }
            dd($rest);
    }
}

