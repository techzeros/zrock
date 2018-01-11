<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Btc_users_address;
use App\Models\User\Btc_users_transaction;



class WalletController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // // $this->middleware('auth');
        // \Auth::logout();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$Btc_users_address = Btc_users_address::all();
        $Btc_users_address = Btc_users_address::where('user_id', \Auth::user()->id)
        ->where('archived', 0)
        ->orderBy('id', 'desc')
        ->get();

        $Btc_users_transaction = Btc_users_transaction::where('user_id', \Auth::user()->id)
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

        return view('user.dashboard.wallet')->with('Btc_users_address', $Btc_users_address)->with('Btc_users_transaction', $Btc_users_transaction);
       // return view('user.dashboard.wallet', compact('Btc_users_address','Btc_users_transaction'));
    }


    public function createwallet()
    {
        //
    }

}
