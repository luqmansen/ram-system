<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Response;
use PDF;

class ManageCustomersController extends Controller
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
        $data['customers']=Customer::get()->all();
        return view('manageCustomers',$data);
    }

    public function delete(Request $request)
    {
        $id=$request->id;
        Customer::where('id',$id)->delete();
        $response = 'ok';
        return Response::json($response);
    }
}
