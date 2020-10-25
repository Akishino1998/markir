<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $table = "tb_parkir";
    protected $primaryKey = "id_parkir";
    public $timestamps = false;
    protected $fillable = ['id_kendaraan','jukir','tgl_masuk','lat','lng'];
    public function UserKendaraan()
    {
        return $this->hasOne('App\UserKendaraan','id_kendaraan','id_kendaraan');
    }
    public function UserJukir()
    {
        return $this->hasOne('App\UserJukir','id','jukir');
    }
    public function UserJukir2()
    {
        return $this->belogsTo('App\UserJukir','jukir','id');
    }
}
