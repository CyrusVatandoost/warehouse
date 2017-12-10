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

      $email_exists_unverified = DB::table('unverified_users')->select('email')->where('email', $request->email)->count(); 

      $email_exists_pending = DB::table('pending_users')->select('email')->where('email', $request->email)->count(); 

      if ($email_exists_unverified > 0) {
            return HomeController::notVerified();

      }
      else if($email_exists_pending > 0){
            return HomeController::notApproved();
      }
      else{
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
          return redirect()->intended('home');
        } 
        else{
            return HomeController::wrongLogin();
        }

      }
    }
}
