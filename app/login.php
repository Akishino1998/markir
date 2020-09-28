<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class login extends Model
{
    use SoftDeletes;
    protected $table = 'tb_admin';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['username'];
    

}
