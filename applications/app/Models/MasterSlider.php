<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSlider extends Model
{
    //
    protected $table = 'master_slider';

    protected $fillable = [
      'judul', 'url_slider', 'keterangan_slider',
      'activated', 'created_by', 'updated_by',
    ];
}
