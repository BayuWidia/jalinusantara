<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use Alert;
use Datatables;
use Carbon\Carbon;
use PDF;
use Dompdf\Dompdf;
use App\Models\Informasi;
use App\Models\MasterKategori;
use App\Http\Requests;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
         return view('backend.article.index');
     }

     public function getDataForDataTable()
     {

       if (Auth::user()->id_role != 4) {
         $querys = Informasi::leftJoin('master_kategori','informasi.id_kategori','=','master_kategori.id')
             ->leftJoin('master_users','informasi.created_by','=','master_users.id')
             ->select(['informasi.id as id_informasi',
                       'informasi.judul_informasi', 'master_kategori.nama_kategori',
                       'informasi.tanggal_publish', 'master_users.fullname',
                       'informasi.flag_headline', 'informasi.flag_publish'])
                       ->orderBy('id_informasi', 'DESC');
       } else {
         $querys = Informasi::leftJoin('master_kategori','informasi.id_kategori','=','master_kategori.id')
             ->leftJoin('master_users','informasi.created_by','=','master_users.id')
             ->select(['informasi.id as id_informasi',
                       'informasi.judul_informasi', 'master_kategori.nama_kategori',
                       'informasi.tanggal_publish', 'master_users.fullname',
                       'informasi.flag_headline', 'informasi.flag_publish'])
                       ->where('informasi.created_by', '=', Auth::user()->id)
                       ->orderBy('id_informasi', 'DESC');
       }

                       // dd($querys);
       return Datatables::of($querys)
         ->addColumn('action', function($query){
             if ($query->flag_headline == "1") {
               $strHeadline = '<a href="#" class="btn btn-deep-purple btn-circle waves-effect waves-circle waves-float flagheadline"
                               data-toggle="modal" data-target="#modalflagheadline" data-value="'.$query->id_informasi.'"
                               data-backdrop="static" data-keyboard="false"><i class="material-icons">favorite</i></a>';
             } else {
               $strHeadline = '<a href="#" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float flagheadline"
                                 data-toggle="modal" data-target="#modalflagheadline" data-value="'.$query->id_informasi.'"
                                 data-backdrop="static" data-keyboard="false"><i class="material-icons">favorite_border</i></a>';
             }

             if ($query->flag_publish == "1") {
               $strPublish = '<a href="#" class="btn btn-warning btn-circle waves-effect waves-circle waves-float flagpublish"
                               data-toggle="modal" data-target="#modalflagpublish" data-value="'.$query->id_informasi.'"
                               data-backdrop="static" data-keyboard="false"><i class="material-icons">star</i></a>';
             } else {
               $strPublish = '<a href="#" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float flagpublish"
                                 data-toggle="modal" data-target="#modalflagpublish" data-value="'.$query->id_informasi.'"
                                 data-backdrop="static" data-keyboard="false"><i class="material-icons">star_border</i></a>';
             }

             if ($query->activated == "1") {
               $strDelete = '<a href="#" class="btn btn-danger btn-circle waves-effect waves-circle waves-float hapus"
                               data-toggle="modal" data-target="#modaldelete"
                               data-value="'.$query->id_informasi.'" data-backdrop="static"
                               data-keyboard="false"><i class="material-icons">lock_outline</i></a>';
             } else {
               $strDelete = '<a href="#" class="btn btn-danger btn-circle waves-effect waves-circle waves-float aktifkan"
                               data-toggle="modal" data-target="#modalAktifkan"
                               data-value="'.$query->id_informasi.'" data-backdrop="static"
                               data-keyboard="false"><i class="material-icons">lock_open</i></a>';
             }

             $strUpd = '<a href="profile.edit/'.$query->id_informasi.'" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                           <i class="material-icons">open_in_new</i></a>';

             $strView = '<a href="profile.view/'.$query->id_informasi.'" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                           <i class="material-icons">pageview</i></a>';

             if (Auth::user()->id_role != 4) {
                   return $strHeadline.$strPublish.$strUpd.$strDelete.$strView;
             } else{
                   if ($query->flag_publish == "1") {
                     return $strView;
                   } else {
                     return $strUpd.$strDelete.$strView;
                   }
             }

         })
         ->editColumn('tanggal_publish', function ($query)
         {
             return Carbon::parse($query->tanggal_publish)->format('d-m-Y');
         })

         ->editColumn('flag_headline', function($query){
           if ($query->flag_headline=="1") {
             return "<span class='label bg-deep-purple'>Headline</span>";
           } elseif ($query->flag_headline=="0")  {
             return "<span class='label bg-blue-grey'>Un Headline</span>";
           }
         })

         ->editColumn('flag_publish', function($query){
           if ($query->flag_publish=="1") {
             return "<span class='label btn-warning'>Publish</span>";
           } elseif ($query->flag_publish=="0")  {
             return "<span class='label bg-blue-grey'>Un Publish</span>";
           }
         })
         ->removeColumn('id_informasi')
         ->make();
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function headline($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
