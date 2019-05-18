<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Events extends Model
{

    use Searchable;

    protected $table = 'events';

    protected $fillable = [
      'id_kategori', 'judul_event', 'tanggal_mulai', 'tanggal_akhir', 'url_foto', 'tags',
      'isi_event', 'maps', 'fasilitator', 'jumlah_peserta', 'lokasi', 'flag_headline',
      'flag_publish', 'view_counter',
      'activated', 'created_by', 'updated_by',
    ];

    public function kategori()
    {
      return $this->belongsTo('App\Models\MasterKategori', 'id_kategori');
    }

    public function searchableAs()
    {
        return 'berita';
    }
}
