<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Reservation;
use Response;
use DB;
use PDF;

class HistoryController extends Controller
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
        
        // $data['history']= Reservation::get()->all();
        $data['history'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->get()->all();
         foreach($data['history'] as $row){
            $path = "storage/file_name/" . $row->file_name;
            // $path = $temp->store('public/file_name');
            $url =  asset($path);
            $row->file_name=$url;
        }
        // dd($data);
        return view('history', $data);
    }
    public function detail(Request $request)
    {
        $id=$request->id;
        $data['history'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->where('reservations.id',$id)
                ->get();
                
         foreach($data['history'] as $row){
            $path = "storage/file_name/" . $row->file_name;
            // $path = $temp->store('public/file_name');
            $url =  asset($path);
            $row->file_name=$url;
        }
        $response=$data['history'];
        // dd($response);
        return Response::json($response);
    }
    public function export($value)
    {
        $status = $value;
        if($status != 'all'){
            $data['history'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->where('reservations.status',$status)
                ->get();
        }
        else{
            $data['history'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->get()->all();
        }
        return view('exportLogTable',$data);
        

    }
    public function exportPdf($value)
    {
        $status = $value;
        if($status != 'all'){
            $data['history'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->where('reservations.status',$status)
                ->get();
        }
        else{
            $data['history'] = Reservation::select(['reservations.*',
         'customers.name', 'customers.telephone', 'customers.email',
         'rooms.room_name'])
                ->leftjoin('rooms', 'reservations.id_room','=','rooms.id')
                ->leftjoin('customers','reservations.id_customer','=','customers.id')
                ->get()->all();
        }
        $pdf = PDF::loadView('exportLogDocs',$data)->setPaper('tabloid', 'landscape');
        return $pdf->download('ReservationsLogTable.pdf');
        // return view('exportRoomsDocs',$data);
    }
}