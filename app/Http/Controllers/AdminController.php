<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin-dashboard');
    }

    public function history(){
        return view('reservation.history');
    }
    
}
