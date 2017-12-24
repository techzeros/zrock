<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use Mail;
use Notification;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Events\UserLoggedIn;
use App\Mail\Admin\LoginRequestPin;
use App\Http\Controllers\Controller;
use App\Models\Admin\AdminLoginRequest;
use Illuminate\Support\Facades\Validator;
use App\Notifications\LoggedInNotification;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating admins for the application and
    | redirecting them to your admin dashboard screen.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login.index');
    }

    /**
     * Show the application's login request form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginRequestForm()
    {
        return view('admin.auth.login.request-pin');
    }

    /**
     * Handles the admins login request
     *
     * @return \Illuminate\Http\Response
     */
    public function requestLoginPin(Request $request)
    {
        $email = $request->input('email');
        $pin = $request->input('pin');
        $admin = Admin::where(['email' => $email, 'pin' => $pin])->first();

        if ($admin != null) {

            // Generate PIN
            $login_token = bin2hex(random_bytes(5));
            // $login_token = encrypt(random_int(1111, 9999));
            
            // Create Admin Login Request
            if (AdminLoginRequest::create(['admin_id' => $admin->id, 'login_token' => $login_token])) {
                // Email the User Verification Token on Successful Application
                $email = new LoginRequestPin($admin, $login_token);
                
                // Send User Activation Link
                Mail::to($admin->email)->send($email);

                return redirect()->back()->with('message', 'Login Authorization link has been emailed to you.');
            }

            return redirect()->back()->withInput()->with('error', 'Error Occured. Retry!');
        }

        return redirect()->back()->withInput()->with('error', 'Invalid Login Request Details!');
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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'pin' => 'required|min:4',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Handle admin login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the form data
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->only('email', 'remember'));
        }

        // Attempt to login the admins in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'pin' => $request->pin], $request->remember)) {
            
            // Trigger UserLoggedIn Event
            $this->authenticated();

            // If successful redirect to admin dashboard
            // return redirect()->intended(route('admin.dashboard'));
            return redirect()->route('admin.dashboard');
        }

        // If unsuccessfull redirect back to the login for with form data
        $request->session()->flash('loginFailed', 'Incorrect Login Details!');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * The user has been authenticated.
     *
     * @return mixed
     */
    protected function authenticated()
    {
        $user = Auth::guard('admin')->user();
        $user_type = 'admin';

        // Delete Login Request for the authenticated admin
        AdminLoginRequest::where(['admin_id' => $user->id])->delete();

        // Send User Logged In Notification
        Notification::send($user, new LoggedInNotification($user));

        // On login Success Fire the Login Activiy Event
        event(new UserLoggedIn($user, $user_type));
    }

    /**
     * Log the admin out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        // Logout Admin
        Auth::guard('admin')->logout();

        // Set Flash Message and redirect to Login Page
        return redirect()->route('admin.login.request')->with('message', 'You have successfully logged out!');
    }
}
