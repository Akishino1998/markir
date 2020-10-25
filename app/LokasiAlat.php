<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiAlat extends Model
{
    protected $table = "temp_lokasi";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id_alat','lat','lng'];
}
