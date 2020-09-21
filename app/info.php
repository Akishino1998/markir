<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefMerk extends Model
{
    protected $table = "ref_merk";
    protected $primaryKey = "id_merk";
    public $timestamps = false;
    protected $fillable = ['merk'];

    //one to many
    public function UserKendaraan()
    {
        return $this->hasMany('App\UserKendaraan','id_merk','merk');
    }
}
