<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Reservation;
use Response;
use DB;
use PDF;

class ManageReservationsController extends Controller
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
        $date = Carbon::now()->format("Y-m-d");
        $datas = Reservation::get()->where('status','active')->all();
        foreach ($datas as $data){
            if($data->date < $date){
                $data->status = "completed";
                $data->save();
            }
        }
        
        
        // pending
        $data['reservations'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->where([['status','pending'],['date','>=',$date]])->get();
         foreach($data['reservations'] as $row){
            $path = "storage/file_name/" . $row->file_name;
            // $path = $temp->store('public/file_name');
            $url =  asset($path);
            $row->file_name=$url;
        }

        // cancelled
        $data['creservations'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->where([['status','cancelled'],['date','>=',$date]])->get();
         foreach($data['creservations'] as $row){
            $path = "storage/file_name/" . $row->file_name;
            // $path = $temp->store('public/file_name');
            $url =  asset($path);
            $row->file_name=$url;
        }

        // cancelled
        $data['areservations'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->where('status','active')->get();
         foreach($data['areservations'] as $row){
            $path = "storage/file_name/" . $row->file_name;
            // $path = $temp->store('public/file_name');
            $url =  asset($path);
            $row->file_name=$url;
        }
        // dd($data);
        return view('manageReservations',$data);
    }
    public function detail(Request $request)
    {
        $id=$request->id;
        $data['reservations'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->where('reservations.id',$id)
                ->get();
                
         foreach($data['reservations'] as $row){
            $path = "storage/file_name/" . $row->file_name;
            // $path = $temp->store('public/file_name');
            $url =  asset($path);
            $row->file_name=$url;
        }
        $response=$data['reservations'];
        // dd($response);
        return Response::json($response);
    }
    public function approve(Request $request){
        $id = $request->id;
        $reservation = Reservation::find($request->id);

        $reservation->status = 'active';

        $reservation->save();
        $response = 'ok';
        return Response::json($response);
    }
    public function cancel(Request $request){
        $id = $request->id;
        $reservation = Reservation::find($request->id);

        $reservation->status = 'cancelled';

        $reservation->save();
        $response = 'ok';
        return Response::json($response);
    }
    public function revive(Request $request){
        $id = $request->id;
        $reservation = Reservation::find($request->id);

        $reservation->status = 'pending';

        $reservation->save();
        $response = 'ok';
        return Response::json($response);
    }
   
}