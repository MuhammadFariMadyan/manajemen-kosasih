<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
     protected $fillable = ['name','email','password','otoritas','jabatan']; 

 	public function otoritas()
    {
    return $this->belongsTo('App\Otoritas','otoritas');
    }

}
