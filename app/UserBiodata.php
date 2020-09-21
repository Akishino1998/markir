<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBiodata extends Model
{
    protected $table = "user_biodata";
    protected $primaryKey = "id_biodata";
    public $timestamps = false;
    protected $fillable = ['username','nama','tgl_lahir','no_hp','email','foto'];
    public function UserAkun()
    {
        return $this->hasMany('App\UserAkun','username','id');
    }
}
