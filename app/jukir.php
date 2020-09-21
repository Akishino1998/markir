<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jukir extends Model
{
        use SoftDeletes; 
        protected $table = "user_jukir_biodata";
        protected $primaryKey = "id";
        public $timestamps = false;
        protected $fillable = ['username','nama','tgl_lahir','no_hp','email','foto'];      
        public function UserJukirBiodata()
        {
            return $this->hasOne('App\UserJukirBiodata','username','username');
        }
}
