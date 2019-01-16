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

    public function deletes(Request $request)
    {
        $ids = $request->ids;
        Customer::whereIn('id',explode(",",$ids))->delete();
        $response = 'ok';
        return Response::json($response);
    }

    public function exportXls()
    {
        $data['customers']=Customer::get()->all();
        return view('exportCustomersTable',$data);
    }

    public function exportPdf()
    {
        $data['customers']=Customer::get()->all();
        $pdf = PDF::loadView('exportCustomersDocs',$data);
        return $pdf->download('CustomersTable.pdf');
        // return view('exportRoomsDocs',$data);
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        $response =Customer::where('id',$id)->get();
        return Response::json($response);

    }
}
