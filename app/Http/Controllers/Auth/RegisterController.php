<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Jrean\UserVerification\Facades\UserVerification as UserVerificationFacade;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;


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

    use VerifiesUsers;

    /**
     * Where to redirect users after registration and when the email sent to an admin.
     *
     * @var string
     */
    protected $redirectTo = '/home'; 
    /**
     * Where to redirect after the verification link is accessed.
     *
     * @var string
     */
    protected $redirectAfterVerification = '/successverification';
    /**
     * Where to redirect if user is verified.
     *
     * @var string
     */
    protected $redirectIfVerified = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_initial' => 'required|string',
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
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_initial' => $data['middle_initial'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {   

      $email_exists_unverified = DB::table('unverified_users')->select('email')->where('email', $request->email)->count(); 

      $email_exists_pending = DB::table('pending_users')->select('email')->where('email', $request->email)->count(); 

      if ($email_exists_unverified > 0) {
            return HomeController::emailExist();

      }
      else if($email_exists_pending > 0){
            return HomeController::emailExist();
      }
      else{
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        UserVerification::generate($user);

        UserVerification::send($user, 'User Registration Request');

        return $this->registered($request, $user)
                    ?: HomeController::emailSent();
      } 
    }

      /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {   
        DB::insert("insert into unverified_users
             select * from users where user_id = $user->user_id");
        DB::table('users')->where('user_id', '=', $user->user_id)->delete();
    }

      /**
     * Handle the user verification.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getVerification(Request $request, $token)
    {

        $email = $request->input('email');

        DB::insert("insert into users
             select * from unverified_users where email = '$email'");
        DB::table('unverified_users')->where('email', '=', $email)->delete();

        if (! $this->validateRequest($request)) {
            return redirect($this->redirectIfVerificationFails());
        }

        try {
            $user = UserVerificationFacade::process($request->input('email'), $token, $this->userTable());
        } catch (UserNotFoundException $e) {
            return redirect($this->redirectIfVerificationFails());
        } catch (UserIsVerifiedException $e) {
            return redirect($this->redirectIfVerified());
        } catch (TokenMismatchException $e) {
            return redirect($this->redirectIfVerificationFails());
        }

        if (config('user-verification.auto-login') === true) {
            auth()->loginUsingId($user->id);
        }

        DB::insert("insert into pending_users
             select * from users where email = '$email'");

        DB::table('users')->where('email', '=', $email)->delete();

        return redirect($this->redirectAfterVerification());
    }

}
