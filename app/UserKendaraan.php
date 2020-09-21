<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserKendaraan extends Model
{
    protected $table = "user_kendaraan";
    protected $primaryKey = "id_kendaraan";
    public $timestamps = false;
    protected $fillable = ['username','jenis_kendaraan','noRegistrasi','namaPemilik','alamat','merk','seri','model','warna','foto','tahunPembuatan',''];
    public function RefJenisKendaraan1()
    {
        return $this->hasOne('App\RefJenisKendaraan','id_ref_kendaraan','jenis_kendaraan');
    }
    public function RefMerk1()
    {
        return $this->hasOne('App\RefMerk','id_merk','merk');
    }
    public function UserAkun()
    {
        return $this->hasOne('App\UserAkun','id','username');
    }
    public function RefModelKendaraan1()
    {
        return $this->hasOne('App\RefModelKendaraan','id_model','model');
    }

    public function RefModelKendaraan2()
    {
        return $this->belongsTo('App\RefModelKendaraan','model','id_model');
    }
    public function RefMerk2()
    {
        return $this->belongsTo('App\RefMerk','merk','id_merk');
    }
    public function RefJenisKendaraan2()
    {
        return $this->belongsTo('App\RefJenisKendaraan','jenis_kendaraan','id_ref_kendaraan');
    }
}
