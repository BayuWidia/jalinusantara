<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\MasterGaleri;
use App\Models\MasterVideo;
use App\Models\MasterSlider;
use App\Http\Requests;

class FeGaleriController extends Controller
{

    public function index()
    {

        $getSlider = MasterSlider::all();
        $getVideo = MasterVideo::select('master_video.*')
                            ->where('flag_video', 1)
                            ->get();
        $getGaleri = MasterGaleri::select('master_galeri.*')
                            ->where('flag_gambar', 1)
                            ->paginate(9);

        return view('frontend.galeri.galeri', compact('getSlider','getGaleri','getVideo'));
    }

}
