<?php

namespace App\Http\Controllers\User;

use Auth;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\BtcUserAddress;
use App\Mail\User\RequestBitcoin;
use Illuminate\Support\Facades\Validator;
use App\Mail\User\EmailVerification;

class RequestBitcoinController extends Controller
{
    // 

    public function index()
    {
        $userAddresses = Auth::user()->btcAddresses;
        $userTransactions = Auth::user()->btcTransactions;
        $usergetUserAddress = BtcUserAddress::getUserAddress();

        return view('user.dashboard.requestbitcoin')
        ->with('userAddresses', $userAddresses)
        ->with('userTransactions', $userTransactions)
        ->with('usergetUserAddress', $usergetUserAddress);

    }

    /**
    *  Get the error messages for the defined validation rules.
    *
     * @return array
    */
    public function messages()
    {
      return [
        'waddress.required' => 'Wallet Address is Required!',
        'waddress.alpha_num'  => 'You Have not Selected a Wallet Address',
        ];
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'waddress' => 'required|not_in:0|alpha_num',
            'amount' => 'required|numeric',
            // 'email' => [
            //     'required', 'string', 'email', 'max:255', 'unique:users', 'unique:admins',
            //     new ValidateEmail(new \GuzzleHttp\Client),
            // ],
            'email' => 'required|string|email|max:255',
            'note' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha',
            ], $this->messages());
    }


    /**
     * User Registration Method
     * Overrides the register method in the RegisterUsers trait
     */
    public function requestbtc(Request $request)
    {
        // Validate Users Input
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $fromemail = Auth::user()->email;
            $fromuser = Auth::user()->name;
            $waddress = $request->waddress;
            $toemail = $request->email;
            $split = explode('@',$toemail);
            $touser = $split[0];
            $amount = $request->amount;
            $note =   $request->note;
            $btcaddr = 'bitcoin:'.$waddress.'?amount='.$amount;
            // Get an instance of RequestBitcoin which extends Mailable
            $data = (object)[
                'touser' => $touser,
                'toemail' => $toemail,
                'fromuser' => $fromuser,
                'fromemail' => $fromemail,
                'waddress' => $waddress,
                'amount' => $amount,
                'note' => $note,
                 'btcaddr' => $btcaddr
            ];
            $email = new RequestBitcoin($data);
            
            // Fire Email for Requesting Bitcoin on Successful Validation
            Mail::to($toemail)->send($email);

            // Redirect User to Request Bitcoin Page With Appropriate Message
            //$success_5 = str_ireplace("{{email}}",$email,__lang(user/dashboard.success_5);
            $success_5 = __('user/dashboard.success_5', ['email' => $toemail]);
            //nanosuccess("$success_5")
            \Session::flash('success', $success_5);
            return redirect()->route('user.requestbtc');
        
        }
        // Redirect User to the previous page
        return redirect()->back()->withErrors($validator)->withInput();
    }






}
