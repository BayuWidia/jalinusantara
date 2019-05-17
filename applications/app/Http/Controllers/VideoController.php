<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use Validator;
use DB;
use App\Models\MasterVideo;
use App\Http\Requests;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        //
        $getVideo = MasterVideo::all();
        return view('backend.video.kelolavideo', compact('getVideo'));
    }


    public function store(Request $request)
    {
        //
        // dd($request);
        $messages = [
          'judul.required' => 'Tidak boleh kosong.',
          'urlVideo.required' => 'Tidak boleh kosong.',
          'activated.required' => 'Tidak boleh kosong.',
        ];

        $validator = Validator::make($request->all(), [
                'judul' => 'required',
                'urlVideo' => 'required',
                'activated' => 'required',
            ], $messages);

        if ($validator->fails()) {
            return redirect()->route('video.index')->withErrors($validator)->withInput();
        }

        //set important video value
        $valimportantvideo="";
        if($request->flagImportantVideo=="") {
          $valimportantvideo=0;
        } else {
          $valimportantvideo=1;
        }

        $checkimportant = MasterVideo::where('flag_important_video', 1)->count();

        if ($checkimportant>=3 && $valimportantvideo==1) {
          return redirect()->route('video.index')->with('messagefail', 'Maksimal jumlah video utama adalah 3.');
        }

        $set = new MasterVideo;
        $set->judul = $request->judul;
        $set->url_video = $request->urlVideo;
        $set->flag_important_video = $valimportantvideo;
        $set->flag_video = 1;
        $set->activated = $request->activated;
        $set->created_by = Auth::user()->id;
        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('video.index')->with('message', 'Berhasil memasukkan video baru.');
    }

    public function show($id)
    {
        //
        $set = MasterVideo::find($id);
        if($set->flag_video=="1") {
          $set->flag_video = 0;
        } elseif ($set->flag_video=="0") {
          $set->flag_video = 1;
        }

        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('video.index')->with('message', 'Berhasil mengubah publish video.');
    }

    public function editimportantvideo($id)
    {
        //
        $set = MasterVideo::find($id);
        if($set->flag_important_video=="1") {
          $set->flag_important_video = 0;
        } elseif ($set->flag_important_video=="0") {
          $set->flag_important_video = 1;
        }
        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('video.index')->with('message', 'Berhasil mengubah utama video.');
    }

    public function edit($id)
    {
        //
        $get = MasterVideo::find($id);
        return $get;
    }

    public function update(Request $request)
    {
        //
        $messages = [
          'id.required' => 'Tidak boleh kosong.',
          'judulEdit.required' => 'Tidak boleh kosong.',
          'urlVideoEdit.required' => 'Tidak boleh kosong.',
          'activatedEdit.required' => 'Tidak boleh kosong.',
        ];

        $validator = Validator::make($request->all(), [
                'id' => 'required',
                'judulEdit' => 'required',
                'urlVideoEdit' => 'required',
                'activatedEdit' => 'required',
            ], $messages);

        if ($validator->fails()) {
            return redirect()->route('video.index')->withErrors($validator)->withInput();
        }

        $set = MasterVideo::find($request->id);
        $set->judul = $request->judulEdit;
        $set->url_video = $request->urlVideoEdit;
        $set->activated = $request->activatedEdit;
        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('video.index')->with('message', 'Berhasil mengubah konten video.');
    }

    public function destroy($id, $status)
    {
        //
        $set = MasterVideo::find($id);
        if ($status == 'aktifkan') {
          $set->activated = 1;
        } else {
          $set->activated = 0;
        }
        $set->updated_by = Auth::user()->id;
        $set->save();

        return redirect()->route('video.index')->with('message', 'Berhasil mengubah status video.');
    }
}
