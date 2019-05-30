<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class RegistrasiEvents extends Model
{
    //
    protected $table = 'registrasi_events';

    protected $fillable = [
      'id_events', 'no_registrasi', 'email','nama_driver', 'nama_co_driver', 'golongan_darah_driver', 'golongan_darah_co_driver',
      'no_telp_driver', 'no_telp_co_driver', 'mobil', 'no_polisi', 'bahan_bakar',
      'ukuran_kemeja_driver', 'ukuran_kemeja_co_driver', 'pax', 'penumpang_1', 'penumpang_2',
      'nomor_pintu', 'flag_approve', 'activated', 'created_by', 'updated_by',
    ];

    public function events()
    {
      return $this->belongsTo('App\Models\Events', 'id_events');
    }

    public static function getMaxRegistrasiCode($params){
       $getMaxRegistrasiCode = DB::select('SELECT max(no_registrasi) no_registrasi_code FROM registrasi_events
                       where id_events=:id_events', ['id_events' => $params]);
       return $getMaxRegistrasiCode;
    }
}
