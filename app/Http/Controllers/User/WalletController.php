<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Btc_users_address;
use App\Models\User\Btc_users_transaction;
use Auth;



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
        $userAddresses = Auth::user()->btcAddresses;
        $userTransactions = Auth::user()->btcTransactions;

        return view('user.dashboard.wallet')
        ->with('userAddresses', $userAddresses)
        ->with('userTransactions', $userTransactions);
       // return view('user.dashboard.wallet', compact('Btc_users_address','Btc_users_transaction'));
    }


    public function createwallet()
    {
        //
    }

}
