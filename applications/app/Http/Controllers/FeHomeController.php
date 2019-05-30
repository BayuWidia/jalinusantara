<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\Events;
use App\Models\Informasi;
use App\Models\MasterVideo;
use App\Models\MasterSponsor;
use App\Models\MasterSlider;
use App\Http\Requests;
use Carbon\Carbon;

class FeHomeController extends Controller
{

    public function index()
    {

        $getSlider = MasterSlider::all();
        $getDataSejarah = Informasi::select('informasi.*')
                      ->where('informasi.flag_status', '=', 'profile')
                      ->where('informasi.id_kategori', '=', '5')
                      ->get();

        $dt = Carbon::now();
        $getDataEvents = Events::select('events.*')
                     ->whereRaw('"'.$dt.'" between tanggal_mulai and tanggal_akhir')
                     ->where('events.flag_headline', '=', '1')
                     ->where('flag_publish', '1')
                     ->limit(10)
                     ->orderBy('created_at', 'DESC')
                     ->get();
                     // dd($getDataEvents);
        $getDataVideo = MasterVideo::select('master_video.*')
                     ->where('flag_important_video', 1)
                     ->limit(1)
                     ->orderby(DB::raw('rand()'))
                     ->get();
        $getSponsor = MasterSponsor::select('master_sponsor.*')
                      ->where('flag_sponsor', 1)
                      ->orderby(DB::raw('rand()'))
                      ->get();

        $getDataArticle = Informasi::leftJoin('master_users','informasi.created_by','=','master_users.id')
                      ->select('informasi.*', 'master_users.name', 'master_users.fullname', 'master_users.email', 'master_users.url_foto as url_foto2')
                      ->where('informasi.flag_status', '=', 'article')
                      ->where('informasi.flag_headline', '=', '1')
                      ->where('informasi.flag_publish', '=', '1')
                      ->limit(3)
                      ->orderby('view_counter','DESC')
                      ->get();
        return view('frontend.home.home', compact('getSlider','getDataSejarah','getDataEvents','getDataVideo','getSponsor','getDataArticle'));
    }

}
