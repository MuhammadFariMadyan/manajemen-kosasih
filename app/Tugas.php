<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    //

    protected $fillable = ['petugas',
			'menugaskan',
			'judul',
			'deskripsi',
			'foto',
			'deadline',
			'status_tugas',
			'masalah',
			'deskripsi_selesai',
			'foto_selesai',
			'foto_masalah',
			'kategori_id',
			'pengecek',
			'tanggal_dikerjakan',
			'tanggal_sudah_selesai',
			'tanggal_dikonfirmasi',
			'lokasi_id'];

	public function kategori()
    {
    return $this->belongsTo('App\Kategori','kategori_id');
    }
    
   public function petugas()
    {
    return $this->belongsTo('App\User','petugas');
    }

    public function menugaskan()
    {

    return $this->belongsTo('App\User','menugaskan');
    }

	public function lokasi()
    {
    return $this->belongsTo('App\Lokasi','lokasi_id');
    }

    
}
