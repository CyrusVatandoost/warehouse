<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Checks if user is verified to login.
     *
     * @return view
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
             if (Auth::attempt(['email' => request('email'), 'password' => request('password'), 'verified' => 1])) {
                $userWaitlist = DB::table('waitlist')->where('user_id', '=', request('user_id'))->first();
                if($userWaitlist == null){
                    return redirect()->intended('home');
                }
                else{
                    auth()->logout();
                    return HomeController::notApproved();
                }
             }
             else{
                auth()->logout();
                return HomeController::notVerified();
             }
        }
        else{
            return HomeController::wrongLogin();
        }
    }
}
