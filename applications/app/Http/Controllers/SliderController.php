<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\MasterSlider;
use App\Http\Requests;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
          $getslider = DB::table('master_slider')->paginate(15);
          return view('backend.slider.kelolaslider', compact('getslider'));
    }

    public function store(Request $request)
    {
      // dd($request->all());
          $messages = [
            'judul.required' => 'Tidak boleh kosong.',
            'urlSlider.required' => 'Tidak boleh kosong.',
            'urlSlider.required' => 'Periksa kembali file image anda.',
            'urlSlider.image' => 'File upload harus image.',
            'urlSlider.mimes' => 'Ekstensi file tidak valid.',
            'urlSlider.max' => 'Ukuran file terlalu besar.',
            'keteranganSlider.required' => 'Tidak boleh kosong.',
            'activated.required' => 'Tidak boleh kosong.',
          ];

          $validator = Validator::make($request->all(), [
                  'judul' => 'required',
                  'keteranganSlider' => 'required',
                  'activated' => 'required',
                  'urlSlider' => 'required|image|mimes:jpeg,jpg,png|max:20000',
              ], $messages);

              if ($validator->fails()) {
                  return redirect()->route('slider.index')
                              ->withErrors($validator)
                              ->withInput();
              }

          $file = $request->file('urlSlider');
          if($file!="") {
              $photoName = time(). '.' . $file->getClientOriginalExtension();
              Image::make($file)->fit(1144,550)->save('images/'. $photoName);
              Image::make($file)->fit(200,122)->save('_thumbs/Slider/'. $photoName);

              $set = new MasterSlider;
              $set->judul = $request->judul;
              $set->url_slider = $photoName;
              $set->keterangan_slider = $request->keteranganSlider;
              $set->flag_slider = 1;
              $set->activated = $request->activated;
              $set->created_by = Auth::user()->id;
              $set->updated_by = Auth::user()->id;
              $set->save();
          } else {
            return redirect()->route('slider.index')->with('messagefail', 'Gambar slider harus di upload.');
          }

          return redirect()->route('slider.index')->with('message', 'Berhasil memasukkan slider baru.');
    }

    public function show($id)
    {
        $set = MasterSlider::find($id);
        if($set->flag_slider=="1") {
          $set->flag_slider = 0;
        } elseif ($set->flag_slider=="0") {
          $set->flag_slider = 1;
        }

        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('slider.index')->with('message', 'Berhasil mengubah publish slider.');
    }

    public function edit($id)
    {
        $get = MasterSlider::find($id);
        return $get;
    }

    public function update(Request $request)
    {
        // dd($request);
        $file = $request->file('urlSlider');
        if($file!="") {
          $photoName = time(). '.' . $file->getClientOriginalExtension();
          Image::make($file)->fit(1144,550)->save('images/'. $photoName);
          Image::make($file)->fit(200,122)->save('_thumbs/Slider/'. $photoName);

          $set = MasterSlider::find($request->id);
          $set->judul = $request->judul;
          $set->url_slider = $photoName;
          $set->keterangan_slider = $request->keteranganSlider;
          $set->activated = $request->activated;
          $set->updated_by = Auth::user()->id;
          $set->save();
        } else {
          $set = MasterSlider::find($request->id);
          $set->judul = $request->judul;
          $set->keterangan_slider = $request->keteranganSlider;
          $set->activated = $request->activated;
          $set->updated_by = Auth::user()->id;
          $set->save();
        }

        return redirect()->route('slider.index')->with('message', 'Berhasil mengubah konten slider.');
    }

    public function destroy($id, $status)
    {
        //
        $set = MasterSlider::find($id);
        if ($status == 'aktifkan') {
          $set->activated = 1;
        } else {
          $set->activated = 0;
        }
        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('slider.index')->with('message', 'Berhasil mengubah status slider.');
    }
}
