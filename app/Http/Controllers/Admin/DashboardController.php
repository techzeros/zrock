<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        // // $this->middleware('auth:admin');
        // $admin = \App\Models\Admin\Admin::find(1);
        // \Auth::guard('admin')->login($admin);
        
    }

    /**
     * Show the app dashboard
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
