<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKategori extends Model
{

    protected $table = 'master_kategori';

    protected $fillable = [
      'nama_kategori', 'keterangan_kategori', 'flag_utama', 'activated', 'created_by', 'updated_by',
    ];
}
