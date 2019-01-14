<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Reservation;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage; // untuk bisa pakai fitur storage

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations =  Reservation::all();
        return view('reservation.room-detail')->with('reservations',$reservations);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.customer-input');
    }

    public function create1()
    {
        return view('reservation.booking-form');
    }


    public function store(Request $request) //Method untuk store form data peminjam (orang)
    {
        $this->validate($request, [
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ]);
        
        $name = $request->input('name');
        $customers = new Customer;
        $customers->name = $request->input('name');
        $customers->telephone = $request->input('telephone');
        $customers->email = $request->input('email');
        $customers->save();

        return redirect('/reservation/bookingform')->with('success', 'Data Input Success', $name);
    }


    public function store1(Request $request) //Method untuk store form data peminjaman
    {
        $this->validate($request, [
            // 'date' => 'required',
            'start_hour' => 'required',
            'end_hour' => 'required',
            'file_name' => 'file | nullable | max:1999',
            'description' => 'required',
        ]);
        
        //handle file upload
        if($request->hasFile('file_name')){
            // Get File Name with extension

            $filenameWithExt = $request->file('file_name')->getClientOriginalName();
            //kalo gini doang, nanti semisal 2 orang yg upload dengan nama 
            // file yang sama, nanti bakal jadi masalah, jadi buat fungsi 
            // untuk misahin 
            
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
        // $something = json_decode($name);
        // $id = $something->{'id'};
            // foreach ($name as $id ) {
            //     ($id -> id);
            // }
       
        $reservations = new Reservation;
        $reservations->id_customer = $name->id;
        // dd($reservations);
        $reservations->id_room = $request->input('id_room');
        $reservations->note = $request->input('note');
        $reservations->date = $request->input('date');
        $reservations->start_hour = $request->input('start_hour');
        $reservations->end_hour = $request->input('end_hour');
        $reservations->description = $request->input('description');
        $reservations->save();

        return view('reservation.room-detail')->with('success', 'Peminjaman Telah Disimpan');
    }

  
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
