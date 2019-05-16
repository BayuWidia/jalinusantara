<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterVideo extends Model
{
    //
    protected $table = 'master_video';

    protected $fillable = [
      'judul', 'url_video', 'flag_important_video', 'flag_slider',
      'activated', 'created_by', 'updated_by',
    ];
}
