<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSponsor extends Model
{
    //
    protected $table = 'master_slider';

    protected $fillable = [
      'nama_sponsor', 'link_sponsor', 'url_sponsor', 'keterangan_sponsor',
      'activated', 'created_by', 'updated_by',
    ];
}
