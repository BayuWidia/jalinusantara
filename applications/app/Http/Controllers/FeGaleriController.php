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
use App\Models\Events;
use App\Http\Requests;

class FeGaleriController extends Controller
{

    public function index($id)
    {
        // dd($id);
        $getSlider = MasterSlider::all();
        $getEvents = Events::select('*')
                            ->where('id', $id)
                            ->get();
        $getGaleri = MasterGaleri::select('*')
                            ->where('id_events', $id)
                            ->where('flag_gambar', 1)
                            ->get();
        $getVideo = MasterVideo::select('*')
                                ->where('id_events', $id)
                                ->where('flag_video', 1)
                                ->get();

        return view('frontend.galeri.galeri', compact('getEvents', 'getSlider','getGaleri','getVideo'));
    }

    // public function indexGaleri()
    // {
    //
    //     $getSlider = MasterSlider::all();
    //     $getGaleri = MasterGaleri::select('*')
    //                         ->where('flag_gambar', 1)
    //                         ->paginate(27);
    //
    //     return view('frontend.galeri.galeri', compact('getSlider','getGaleri'));
    // }

    // public function indexVideo()
    // {
    //
    //     $getSlider = MasterSlider::all();
    //     $getVideo = MasterVideo::select('*')
    //                         ->where('flag_video', 1)
    //                         ->paginate(20);
    //
    //     return view('frontend.galeri.video', compact('getSlider','getVideo'));
    // }

}
