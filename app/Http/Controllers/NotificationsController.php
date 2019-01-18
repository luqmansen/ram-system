<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notif;
use App\Reservation;
use Response;

class NotificationsController extends Controller
{
    public function notif(){
        $current = Notif::find(1);
        $current_length = $current->before;

        $reservation = Reservation::get()->all();
        $row_length = count($reservation);

        $response = 'nonew';

        if($row_length > $current_length){
            $response = 'ok';
        }
        $current->before = $row_length;
        $current->save();
        return  Response::json($response);
}
}
