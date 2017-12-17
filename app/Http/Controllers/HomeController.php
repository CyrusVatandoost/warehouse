<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;
use Jrean\UserVerification\Traits\UserVerification;
use App\FeaturedProject;

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

    public function welcome() {
        $featured_projects = FeaturedProject::get();
        return view('welcome', compact('featured_projects'));
    }

    /**
     * Show the application account page.
     *
     * @return \Illuminate\Http\Response
     */
    public function account() {

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
        return view ('errors.notverified');
    }

    /**
     * Redirect if wrong login.
     *
     * @return \Illuminate\Http\Response
     */
    public static function wrongLogin()
    {
        return view ('errors.wronglogin');
    }

    /**
     * Redirect if not yet approved.
     *
     * @return \Illuminate\Http\Response
     */
    public static function notApproved()
    {
        return view ('errors.notapproved');
    }

    /**
     * Redirect if not yet approved.
     *
     * @return \Illuminate\Http\Response
     */
    public static function emailExist()
    {
        return view ('errors.emailexists');
    }

    /**
     * Redirect after email sent.
     *
     * @return \Illuminate\Http\Response
     */
    public static function emailSent()
    {
        return view ('vendor.laravel-user-verification.emailsent');
    }
}
