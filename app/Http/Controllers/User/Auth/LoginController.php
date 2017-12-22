<?php

namespace App\Http\Controllers\User\Auth;

use Auth;
use Notification;
use Illuminate\Http\Request;
use App\Events\UserLoggedIn;
use App\Http\Controllers\Controller;
use App\Notifications\LoggedInNotification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('user.auth.login.index');
    }

    /**
     * Get the needed authorization credentials from the request.
     * Overrides the AuthenticateUsers Trait's credentials method
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'activated' => 1,
        ];
    }

    /**
     * Validate the user login request.
     * Overrides the AuthenticatesUsers' validateLogin method
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->route('home');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // Logged In User Type
        $user_type = 'user';

        // Send Login Notification
        Notification::send($user, new LoggedInNotification($user));

        // On login Success Fire the Login Activiy Event
        event(new UserLoggedIn($user, $user_type));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Logout User
        Auth::guard('web')->logout();
        // $request->session()->invalidate();

        // Set Flash Message and redirect to Login Page
        \Session::flash('message', 'You have successfully logged out!');
        return redirect()->route('login');
    }
}
