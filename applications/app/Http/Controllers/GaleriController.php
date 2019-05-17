<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\MasterGaleri;
use App\Http\Requests;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
          $getGaleri = MasterGaleri::all();
          return view('backend.galeri.kelolagaleri', compact('getGaleri'));
    }

    public function store(Request $request)
    {
      // dd($request->all());
          $messages = [
            'judul.required' => 'Tidak boleh kosong.',
            'urlGaleri.required' => 'Tidak boleh kosong.',
            'urlGaleri.required' => 'Periksa kembali file image anda.',
            'urlGaleri.image' => 'File upload harus image.',
            'urlGaleri.mimes' => 'Ekstensi file tidak valid.',
            'urlGaleri.max' => 'Ukuran file terlalu besar.',
            'keteranganGaleri.required' => 'Tidak boleh kosong.',
            'activated.required' => 'Tidak boleh kosong.',
          ];

          $validator = Validator::make($request->all(), [
                  'judul' => 'required',
                  'keteranganGaleri' => 'required',
                  'activated' => 'required',
                  'urlGaleri' => 'required|image|mimes:jpeg,jpg,png|max:20000',
              ], $messages);

              if ($validator->fails()) {
                  return redirect()->route('galeri.index')
                              ->withErrors($validator)
                              ->withInput();
              }

          $file = $request->file('urlGaleri');
          if($file!="") {
              $photoName = time(). '.' . $file->getClientOriginalExtension();
              Image::make($file)->fit(457,250)->save('images/'. $photoName);
              Image::make($file)->fit(200,122)->save('_thumbs/Galeri/'. $photoName);

              $set = new MasterGaleri;
              $set->judul = $request->judul;
              $set->url_gambar = $photoName;
              $set->keterangan_gambar = $request->keteranganGaleri;
              $set->flag_gambar = 1;
              $set->activated = $request->activated;
              $set->created_by = Auth::user()->id;
              $set->updated_by = Auth::user()->id;
              $set->save();
          } else {
            return redirect()->route('galeri.index')->with('messagefail', 'Gambar galeri harus di upload.');
          }

          return redirect()->route('galeri.index')->with('message', 'Berhasil memasukkan galeri baru.');
    }

    public function show($id)
    {
        $set = MasterGaleri::find($id);
        if($set->flag_gambar=="1") {
          $set->flag_gambar = 0;
        } elseif ($set->flag_gambar=="0") {
          $set->flag_gambar = 1;
        }
        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('galeri.index')->with('message', 'Berhasil mengubah publish galeri.');
    }

    public function edit($id)
    {
        $get = MasterGaleri::find($id);
        return $get;
    }

    public function update(Request $request)
    {
        // dd($request);
        $file = $request->file('urlGaleri');
        if($file!="") {
          $photoName = time(). '.' . $file->getClientOriginalExtension();
          Image::make($file)->fit(457,250)->save('images/'. $photoName);
          Image::make($file)->fit(200,122)->save('_thumbs/galeri/'. $photoName);

          $set = MasterGaleri::find($request->id);
          $set->judul = $request->judul;
          $set->url_gambar = $photoName;
          $set->keterangan_gambar = $request->keteranganGaleri;
          $set->activated = $request->activated;
          $set->updated_by = Auth::user()->id;
          $set->save();
        } else {
          $set = MasterGaleri::find($request->id);
          $set->judul = $request->judul;
          $set->keterangan_gambar = $request->keteranganGaleri;
          $set->activated = $request->activated;
          $set->updated_by = Auth::user()->id;
          $set->save();
        }

        return redirect()->route('galeri.index')->with('message', 'Berhasil mengubah konten galeri.');
    }

    public function destroy($id, $status)
    {
        $set = MasterGaleri::find($id);
        if ($status == 'aktifkan') {
          $set->activated = 1;
        } else {
          $set->activated = 0;
        }
        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('galeri.index')->with('message', 'Berhasil mengubah status galeri.');
    }
}
