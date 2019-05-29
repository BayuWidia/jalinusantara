<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    //
    protected $table = 'keluarga';

    protected $fillable = [
      'id_registrasi', 'nama_keluarga', 'hubungan_keluarga', 'no_telp_keluarga',
      'activated', 'created_by', 'updated_by',
    ];

    public function events()
    {
      return $this->belongsTo('App\Models\Events', 'id_events');
    }
}
