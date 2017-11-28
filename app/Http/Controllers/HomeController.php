<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;
use Jrean\UserVerification\Traits\UserVerification;

class HomeController extends Controller
{
    use UserVerification;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application account page.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        return view ('account');
    }

    /**
     * Show the application account page.
     *
     * @return \Illuminate\Http\Response
     */
    public function organization()
    {
        return view ('organization');
    }

    /**
     * Show the application project page.
     *
     * @return App\Controllers\ProjectController
     */
    public function projects()
    {
        $projects = new ProjectController();
        return $projects->index();
    }

    /**
     * Redirect if user not verified.
     *
     * @return \Illuminate\Http\Response
     */
    public static function notVerified()
    {
        return view ('verifyerror.notverified');
    }
}
