<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterSponsor extends Model
{
    //
    protected $table = 'master_sponsor';

    protected $fillable = [
      'nama_sponsor', 'link_sponsor', 'url_sponsor', 'keterangan_sponsor', 'flag_medsos',
      'activated', 'created_by', 'updated_by',
    ];
}
