<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('petugas');
            $table->integer('menugaskan')->nullable();
            $table->string('judul');
            $table->string('deskripsi');
            $table->integer('kategori_id');
            $table->string('deskripsi_selesai')->nullable();
            $table->string('foto')->nullable();
            $table->string('foto_selesai')->nullable();
            $table->string('foto_masalah')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('status_tugas')->default(0);
            $table->string('masalah')->nullable();
            $table->integer('pengecek')->nullable();
            $table->date('tanggal_dikerjakan')->nullable();
            $table->date('tanggal_sudah_selesai')->nullable();
            $table->date('tanggal_dikonfirmasi')->nullable();
            
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
        Schema::dropIfExists('tugas');
    }
}
