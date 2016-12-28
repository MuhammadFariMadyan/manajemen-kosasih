<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarController extends Model
{
    //


    protected $fillable = ['isi_komentar','user_id','tugas_id'];

      public function user()
    {
    return $this->belongsTo('App\User','user_id');
    }
}
