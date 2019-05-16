<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterVideo extends Model
{
    //
    protected $table = 'master_video';

    protected $fillable = [
      'judul', 'url_video', 'flag_important_video',
      'activated', 'created_by', 'updated_by',
    ];
}
