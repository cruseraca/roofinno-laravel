<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    //deklarasi tabel
    protected $table = 'sensor';
    protected $fillable = ['ISACTIVE'];
    public $timestamps = false;
    protected $primaryKey = 'IDSENSOR';
}
