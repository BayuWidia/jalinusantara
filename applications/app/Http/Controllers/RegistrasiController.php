<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\Events;
use App\Models\RegistrasiEvents;
use App\Models\Keluarga;
use App\Http\Requests;


class RegistrasiController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        //
        $getRegistrasiEvents = RegistrasiEvents::all();
        return view('backend.registrasi.kelolaregistrasi', compact('getRegistrasiEvents'));
    }


    public function store(Request $request)
    {
      // dd($request->all());
          $messages = [
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
              return redirect()->route('')->withErrors($validator)->withInput();
          }

          DB::transaction(function() use($request) {
            $registrasi = RegistrasiEvents::create([
                  'id_events'  => $request->idEvents,
                  'no_registrasi' => 'generate',
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

          return redirect()->route('')->with('message', 'Pendaftaran pada events tersebut berhasil.');
    }

    public function edit($id)
    {
        $get = RegistrasiEvents::find($id);
        return $get;
    }

    public function editKeluarga($id)
    {
        $get = RegistrasiEvents::leftjoin('keluarga', 'registrasi_events.id', '=', 'keluarga.id_registrasi')
                        ->select('registrasi_events.*', 'keluarga.nama_keluarga','keluarga.hubungan_keluarga','keluarga.no_telp_keluarga')
                        ->where('registrasi_events.id','=',$id)
                        ->get();
        return $get;
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $messages = [
          'id.required' => 'Tidak boleh kosong.',
          'nomorPintu.required' => 'Tidak boleh kosong.',
        ];

        $validator = Validator::make($request->all(), [
                'id' => 'required',
                'nomorPintu' => 'required',
            ], $messages);

        if ($validator->fails()) {
          // dd($validator);
            return redirect()->route('registrasi.index')->withErrors($validator)->withInput();
        }

        $set = RegistrasiEvents::find($request->id);
        $set->nomor_pintu = $request->nomorPintu;
        $set->flag_approve = 1;
        $set->updated_by = Auth::user()->id;
        $set->save();

        \LogActivities::insLogActivities('log update successfully.');

        return redirect()->route('registrasi.index')->with('message', 'Berhasil mengubah konten registrasi.');
    }

    public function destroy($id, $status)
    {
        $set = RegistrasiEvents::find($id);
        if ($status == 'aktifkan') {
          $set->activated = 1;
        } else {
          $set->activated = 0;
        }
        $set->updated_by = Auth::user()->id;
        $set->save();

        \LogActivities::insLogActivities('log destroy successfully.');

        return redirect()->route('registrasi.index')->with('message', 'Berhasil mengubah status registrasi.');
    }
}
