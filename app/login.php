<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $table = 'tb_admin';
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id','username'];
}
