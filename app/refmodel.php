<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefModelKendaraan extends Model
{
    protected $table = "ref_model_kendaraan";
    protected $primaryKey = "id_model";
    public $timestamps = false;
    protected $fillable = ['model'];

    //one to many
    public function UserKendaraan()
    {
        return $this->hasMany('App\UserKendaraan','id_model','model');
    }
}
