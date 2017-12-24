<?php

namespace App\Http\Controllers\User\Auth;

use DB;
use Mail;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Mail\User\EmailVerification;
use App\Http\Controllers\Controller;
use App\Http\Validations\ValidateEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return route('user.login.form');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('user.auth.register.index');
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
            'name' => 'required|string|max:255',
            // 'email' => [
            //     'required', 'string', 'email', 'max:255', 'unique:users', 'unique:admins',
            //     new ValidateEmail(new \GuzzleHttp\Client),
            // ],
            'email' => 'required|string|email|max:255|unique:users|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(10),
        ]);
    }

    /**
     * User Registration Method
     * Overrides the register method in the RegisterUsers trait
     */
    public function register(Request $request)
    {
        // Validate Users Input
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 
        // Attempt to register a User
        $user = $this->create($request->all());

        if ($user) {
            // Email the User Verification Token on Successful Registration
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
            
            // Send User Activation Link
            Mail::to($user->email)->send($email);

            // Redirect User to Login Page With Appropriate Message
            \Session::flash('message', 'Activation Link Has been Sent. Login to your Email Address for activation procedure.');
            return redirect()->route('user.login.form');
        }
        
        // Redirect User to the previous page
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Get the user who has the same token and change his/her status to verified i.e. 1
    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        User::where('email_token', $token)->firstOrFail()->activateUser();

        // Flash Message on Successful activation
        \Session::flash('message', 'Account Has been Activated Successfully. You can now Login.');
        return redirect()->route('user.login.form');
    }
}
