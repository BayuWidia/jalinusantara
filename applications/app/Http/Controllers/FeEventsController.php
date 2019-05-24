<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\MasterGaleri;
use App\Http\Requests;

class FeEventsController extends Controller
{

    public function index()
    {
          return view('frontend.events.events');
    }

}
