<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class RequestBitcoinController extends Controller
{
    //

    public function index()
    {
        $userAddresses = Auth::user()->btcAddresses;
        $userTransactions = Auth::user()->btcTransactions;

        return view('user.dashboard.requestbitcoin')
        ->with('userAddresses', $userAddresses)
        ->with('userTransactions', $userTransactions);

    }
}
