<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Room;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Session;
use Redirect;
use DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        
    // public function roomdetail($day, $month, $year) //buat filter event yang ditampilkan pada tanggal spesifik
    // {
    //     $date = "$year-$month-$day";
    //     $reservations =  Reservation::select('*')->where('date', '=', $date)->get();
    //     // dd($year,$month, $day);
        
    //     return view('reservation.room-detail')->with('reservations',$reservations)->with('day', $day)->with('month', $month)->with('year', $year);
    // }


    public function create($day, $month, $year, $room)
    {
        // dd(Session::all());
        
        return view('reservation.customer-input')->with('day', $day)->with('month', $month)->with('year', $year)->with('room', $room);
    }

    public function create1($day, $month, $year, $room)
    {
        $day = Crypt::decrypt($day);
        $month = Crypt::decrypt($month);
        $year = Crypt::decrypt($year);
        $room = Crypt::decrypt($room);
        
        if(!Session::has('registration_step') || Session::get('registration_step') != 1) {
            return Redirect::to('/reservation/customerform/'.$day.'/'.$month.'/'.$year.'/'.$room.'');
        }
        //fungsi untuk return array untuk restriction di date
        $restriction =  Reservation::select('*')->get();
        $date = "$day-$month-$year";
        $dateISO = "$year-$month-$day";
        
        $timerange = Reservation::select('start_hour', 'end_hour')->where([['date', '=', $dateISO], ['id_room', '=', $room]])->get();
        $disabledTime = array();
        $disab = array();
        foreach ($timerange as $time) 
        {
            $disabledTime[] = array(
                $disab[] = $time->start_hour,
                $disab[] = $time->end_hour
            );
        }
        $disabledRange = json_encode($disabledTime);

        $roomName = Room::select('name')->where('id', '=',$room)->first();
        
        return view('reservation.booking-form')->with('disabledRange', $disabledRange)->with('day', $day)->with('month', $month)->with('year', $year)->with('date', $date)->with('room', $room)->with('roomName', $roomName);
    }

    

    public function store(Request $request ) //Method untuk store form data peminjam (orang)
    {
        Session::put('registration_step', 1);
        $this->validate($request, [
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            
        ]);

        
        $name = $request->input('name');
        $customers = new Customer;
        $customers->name = $request->input('name');
        $customers->telephone = $request->input('telephone');
        $customers->email = $request->input('email');
        $customers->save();
        
        $day = $request->input('day');
        $month = $request->input('month');
        $year = $request->input('year');
        $room = $request->input('room');

        $day = Crypt::encrypt($day);
        $month = Crypt::encrypt($month);
        $year = Crypt::encrypt($year);
        $room = Crypt::encrypt($room);
        return redirect('/reservation/bookingform/'.$day.'/'.$month.'/'.$year.'/'.$room.'')->with('day', $day)->with('month', $month)->with('year', $year)->with('room', $room);
    }


    public function store1(Request $request) //Method untuk store form data peminjaman
    {
        $this->validate($request, [
            'start_hour' => 'required',
            'end_hour' => 'required',
            'id_room' => 'required',
            'description' => 'required',
            'file_name' => 'file | nullable | max: 1999 | mimes:pdf, jpg, jpeg'
        ]);
        
            
        if($request->hasFile('file_name')){
            // Get File Name with extension
            $filenameWithExt = $request->file('file_name')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('file_name')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload the image
            $path = $request->file('file_name')->storeAs('public/file_name', $fileNameToStore);
        } else{
            $fileNameToStore = 'file.ext';
        }

       $name =  Customer::select('id')->orderBy('created_at','desc')->first();
      
        // fungsi ubah format date //ke 2019-01-17
        $originalDate = $request->input('date');
        $newDate = date("Y-m-d", strtotime($originalDate));
        
        $reservations = new Reservation;
        $reservations->id_customer = $name->id;
        $reservations->id_room = $request->input('id_room');
        $reservations->note = $request->input('note');
        $reservations->date = $newDate;
        $reservations->start_hour = $request->input('start_hour');
        $reservations->end_hour = $request->input('end_hour');
        $reservations->description = $request->input('description');
        $reservations->file_name = $fileNameToStore;
        $reservations->save();

        $room = Room::all(['id', 'name','table_capacity','chair_capacity']);
        return view('index')->with('success', 'Peminjaman Telah Disimpan')->with('room', $room);
    }

}
