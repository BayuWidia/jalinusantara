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
use App\Models\RegistrasiEvents;
use App\Models\Keluarga;
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
                      ->orderBy('created_at', 'DESC')
                      ->paginate(30);
                      // dd($getInformasi[0]->nama_kategori);
      $getSponsor = MasterSponsor::select('master_sponsor.*')
                    ->where('flag_sponsor', 1)
                    ->orderby(DB::raw('rand()'))
                    ->get();


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

    public function indexPendaftaran($id)
    {
      $getSlider = MasterSlider::all();
      $getEvents = Events::where('events.id','=',$id)->get();


      return view('frontend.events.pendaftaran', compact('getEvents','getSlider'));
    }

    public function storePendaftaran(Request $request)
    {
      // dd($request->all());
          $messages = [
            'email.required' => 'Tidak boleh kosong.',
            'namaDriver.required' => 'Tidak boleh kosong.',
            'namaCoDriver.required' => 'Tidak boleh kosong.',
            'golonganDarahDriver.required' => 'Tidak boleh kosong.',
            'golonganDarahCoDriver.required' => 'Tidak boleh kosong.',
            'noTelpDriver.required' => 'Tidak boleh kosong.',
            'noTelpCoDriver.required' => 'Tidak boleh kosong.',
            'mobil.required' => 'Tidak boleh kosong.',
            'noPolisi.required' => 'Tidak boleh kosong.',
            'bahanBakar.required' => 'Tidak boleh kosong.',
            'ukuranKemejaDriver.required' => 'Tidak boleh kosong.',
            'ukuranKemejaCoDriver.required' => 'Tidak boleh kosong.',
            'pax.required' => 'Tidak boleh kosong.',
            'penumpang1.required' => 'Tidak boleh kosong.',
            'penumpang2.required' => 'Tidak boleh kosong.',
          ];

          $validator = Validator::make($request->all(), [
                  'email' => 'required',
                  'namaDriver' => 'required',
                  'namaCoDriver' => 'required',
                  'golonganDarahDriver' => 'required',
                  'golonganDarahCoDriver' => 'required',
                  'noTelpDriver' => 'required',
                  'noTelpCoDriver' => 'required',
                  'mobil' => 'required',
                  'noPolisi' => 'required',
                  'bahanBakar' => 'required',
                  'ukuranKemejaDriver' => 'required',
                  'ukuranKemejaCoDriver' => 'required',
                  'pax' => 'required',
                  'penumpang1' => 'required',
                  'penumpang2' => 'required',
              ], $messages);

          if ($validator->fails()) {
              return redirect()->route('events.pendaftaran', ['id' => $request->idEvents])->withErrors($validator)->withInput();
          }

          DB::transaction(function() use($request) {
            $registrasi = RegistrasiEvents::create([
                  'id_events'  => $request->idEvents,
                  'no_registrasi' => 'generate',
                  'email' => $request->email,
                  'nama_driver'  => $request->namaDriver,
                  'nama_co_driver'  => $request->namaCoDriver,
                  'golongan_darah_driver'  => $request->golonganDarahDriver,
                  'golongan_darah_co_driver'  => $request->golonganDarahCoDriver,
                  'no_telp_driver'  => $request->noTelpDriver,
                  'no_telp_co_driver'  => $request->noTelpCoDriver,
                  'mobil'  => $request->mobil,
                  'no_polisi'  => $request->noPolisi,
                  'bahan_bakar'  => $request->bahanBakar,
                  'ukuran_kemeja_driver'  => $request->ukuranKemejaDriver,
                  'ukuran_kemeja_co_driver'  => $request->ukuranKemejaCoDriver,
                  'pax'  => $request->pax,
                  'penumpang_1'  => $request->penumpang1,
                  'penumpang_2'  => $request->penumpang2,
                  'nomor_pintu'  => 0,
                  'flag_approve'  => 0,
                  'activated'  => 1,
                  'created_by' => $request->email,
            ]);

              $dataKeluargas = $request->input('dataKeluarga');
              foreach($dataKeluargas as $dataKeluarga){
                $set = new Keluarga;
                $set->id_registrasi    = $registrasi->id;
                $set->nama_keluarga    = $dataKeluarga['namaKeluarga'];
                $set->hubungan_keluarga    = $dataKeluarga['hubunganKeluarga'];
                $set->no_telp_keluarga    = $dataKeluarga['noTelpKeluarga'];
                $set->activated  = 1;
                $set->created_by = $request->email;
                $set->save();
              }
          });

          \LogActivities::insLogActivities('log insert successfully.');

          return redirect()->route('events.pendaftaran', ['id' => $request->idEvents])->with('message', 'Pendaftaran pada events tersebut berhasil.');
    }

}
