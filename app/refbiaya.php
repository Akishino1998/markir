<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class refbiaya extends Model
{
    protected $table = "ref_jenis_kendaraan";
    protected $primaryKey = "id_ref_kendaraan";
    public $timestamps = false;
    protected $fillable = ['jenis_kendaraan','biaya_per_jam'];
    
    //one to many
    public function UserKendaraan()
    {
        return $this->hasMany('App\UserKendaraan','id_ref_kendaraan','jenis_kendaraan');
    }
}