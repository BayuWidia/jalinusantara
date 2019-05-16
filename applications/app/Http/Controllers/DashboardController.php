<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
        return view('backend.dashboard.dashboard');
    }

}
