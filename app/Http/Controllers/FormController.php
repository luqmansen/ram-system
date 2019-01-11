<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Reservation;
use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation.room-detail');
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
            'date' => 'required',
            'start_hour' => 'required',
            'end_hour' => 'required',
            'description' => 'required',
        ]);
        
        // $name = DB::table('reservations')->select('id')->orderBy('created_at', 'desc')->first();
        
        // $user = json_decode(json_decode($name), true);

        $name =  Customer::select('id')->orderBy('created_at','desc')->take(1)->get();
        // $something = json_decode($name);
        // $id = $something->{'id'};
            foreach ($name as $id ) {
                ($id -> id);
                
            }
        
        

        // $user = var_dump($customer->id);
        
        $reservations = new Reservation;
        $reservations->id_customer = $id->id;
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
