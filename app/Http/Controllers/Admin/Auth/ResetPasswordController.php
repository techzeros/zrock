<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    // Show Admin Reset Password Form
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.passwords.reset')
            ->with([
                'token' => $token, 
                'email' => $request->email,
            ]);
    }

    // Defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('admin');
    }

    // Defining our password broker function
    protected function broker()
    {
        return Password::broker('admins');
    }
}
