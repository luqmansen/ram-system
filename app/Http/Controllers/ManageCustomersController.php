<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Customer;
use App\Reservation;
use Response;
use DB;
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
