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

    public function indexGaleri()
    {

        $getSlider = MasterSlider::all();
        $getGaleri = MasterGaleri::select('master_galeri.*')
                            ->where('flag_gambar', 1)
                            ->paginate(27);

        return view('frontend.galeri.galeri', compact('getSlider','getGaleri'));
    }

    public function indexVideo()
    {

        $getSlider = MasterSlider::all();
        $getVideo = MasterVideo::select('master_video.*')
                            ->where('flag_video', 1)
                            ->paginate(20);

        return view('frontend.galeri.video', compact('getSlider','getVideo'));
    }

}
