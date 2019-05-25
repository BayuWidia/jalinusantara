<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\Events;
use App\Models\MasterSlider;
use App\Models\MasterSponsor;
use App\Http\Requests;

class FeEventsController extends Controller
{

    public function index($id)
    {
      $getSlider = MasterSlider::all();
      $getEvents = Events::join('master_kategori', 'events.id_kategori', '=', 'master_kategori.id')
                      ->leftJoin('master_users','events.created_by','=','master_users.id')
                      ->select('events.*', 'master_kategori.nama_kategori','master_users.name',
                                'master_users.fullname', 'master_users.email', 'master_users.url_foto as url_foto2')
                      ->where('events.id_kategori','=',$id)
                      ->where('flag_publish', 1)
                      ->paginate(30);
                      // dd($getInformasi[0]->nama_kategori);
      $getSponsor = MasterSponsor::all();


      return view('frontend.events.events', compact('getEvents','getSlider','getSponsor'));
    }

    public function indexById($id, $idKategori)
    {
      $getSlider = MasterSlider::all();
      $getEvents = Events::join('master_kategori', 'events.id_kategori', '=', 'master_kategori.id')
                      ->leftJoin('master_users','events.created_by','=','master_users.id')
                      ->select('events.*', 'master_kategori.nama_kategori','master_users.name',
                                'master_users.fullname', 'master_users.email', 'master_users.url_foto as url_foto2')
                      ->where('events.id','=',$id)
                      ->where('flag_publish', 1)
                      ->get();
                      // dd($getInformasi[0]->nama_kategori);
      $getSponsor = MasterSponsor::all();

      $getJumlahKategori = Events::join('master_kategori', 'events.id_kategori', '=', 'master_kategori.id')
                          ->select('id_kategori', DB::raw('count(*) as jumlah'),'master_kategori.nama_kategori')
                          ->where('flag_publish', 1)
                          ->groupby('id_kategori','nama_kategori')
                          ->orderby('jumlah', 'desc')
                          ->get();

      $getEventsTerkait = Events::select('events.*')
                          ->where('id_kategori', $idKategori)
                          ->where('flag_publish', 1)
                          ->limit(5)
                          ->orderby(DB::raw('rand()'))
                          ->get();

      $getEventsPopuler = Events::select('events.*')
                          ->where('id_kategori', $idKategori)
                          ->where('flag_publish', 1)
                          ->limit(5)
                          ->orderby('view_counter', 'desc')
                          ->get();
                          // dd($getArticleTerkait);
                          // dd($getEvents);

       return view('frontend.events.eventsById', compact('getEvents','getSlider','getSponsor',
                                                          'getJumlahKategori','getEventsTerkait','getEventsPopuler'));
    }

}
