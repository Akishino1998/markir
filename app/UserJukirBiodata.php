<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserJukirBiodata extends Model
{
    protected $table = "user_jukir_biodata";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['username','nama','tgl_lahir','no_hp','email','foto'];
    // public function UserAkun()
    // {
    //     return $this->belongsTo('App\UserAkun','username','username');
    // }
}
