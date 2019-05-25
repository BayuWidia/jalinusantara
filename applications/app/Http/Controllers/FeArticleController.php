<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\Informasi;
use App\Models\MasterSlider;
use App\Models\MasterSponsor;
use App\Http\Requests;

class FeArticleController extends Controller
{

    public function index($id)
    {
      $getSlider = MasterSlider::all();
      $getArticle = Informasi::join('master_kategori', 'informasi.id_kategori', '=', 'master_kategori.id')
                      ->leftJoin('master_users','informasi.created_by','=','master_users.id')
                      ->select('informasi.*', 'master_kategori.nama_kategori','master_users.name',
                                'master_users.fullname', 'master_users.email', 'master_users.url_foto as url_foto2')
                      ->where('informasi.id_kategori','=',$id)
                      ->where('flag_publish', 1)
                      ->paginate(10);
                      // dd($getInformasi[0]->nama_kategori);
      $getSponsor = MasterSponsor::all();

      $getJumlahKategori = Informasi::join('master_kategori', 'informasi.id_kategori', '=', 'master_kategori.id')
                          ->select('id_kategori', DB::raw('count(*) as jumlah'),'master_kategori.nama_kategori')
                          ->where('flag_publish', 1)
                          ->where('informasi.flag_status', '=', 'article')
                          ->groupby('id_kategori','nama_kategori')
                          ->orderby('jumlah', 'desc')
                          ->get();

      $getArticlePopuler = Informasi::select('informasi.*')
                          ->where('id_kategori', $id)
                          ->where('flag_publish', 1)
                          ->limit(5)
                          ->orderby('view_counter', 'desc')
                          ->get();
      return view('frontend.article.article', compact('getArticle','getSlider','getSponsor',
                                                      'getJumlahKategori','getArticlePopuler'));
    }

    public function indexById($id, $idKategori)
    {
      $getSlider = MasterSlider::all();
      $getArticle = Informasi::join('master_kategori', 'informasi.id_kategori', '=', 'master_kategori.id')
                      ->leftJoin('master_users','informasi.created_by','=','master_users.id')
                      ->select('informasi.*', 'master_kategori.nama_kategori','master_users.name',
                                'master_users.fullname', 'master_users.email', 'master_users.url_foto as url_foto2')
                      ->where('informasi.id','=',$id)
                      ->where('flag_publish', 1)
                      ->get();
                      // dd($getInformasi[0]->nama_kategori);
      $getSponsor = MasterSponsor::all();

      $getJumlahKategori = Informasi::join('master_kategori', 'informasi.id_kategori', '=', 'master_kategori.id')
                          ->select('id_kategori', DB::raw('count(*) as jumlah'),'master_kategori.nama_kategori')
                          ->where('flag_publish', 1)
                          ->where('informasi.flag_status', '=', 'article')
                          ->groupby('id_kategori','nama_kategori')
                          ->orderby('jumlah', 'desc')
                          ->get();

      $getArticleTerkait = Informasi::select('informasi.*')
                          ->where('id_kategori', $idKategori)
                          ->where('flag_publish', 1)
                          ->limit(5)
                          ->orderby(DB::raw('rand()'))
                          ->get();

      $getArticlePopuler = Informasi::select('informasi.*')
                          ->where('id_kategori', $idKategori)
                          ->where('flag_publish', 1)
                          ->limit(5)
                          ->orderby('view_counter', 'desc')
                          ->get();
                          // dd($getArticleTerkait);

      return view('frontend.article.articleById', compact('getArticle','getSlider','getSponsor',
                                                          'getJumlahKategori','getArticleTerkait','getArticlePopuler'));
    }

}
