<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kategori');
            $table->string('keterangan_kategori');
            // 1 untuk about; 2 untuk event; 3 untuk berita
            $table->integer('flag_utama')->nullable();
            $table->string('activated');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('master_kategori');
    }
}
