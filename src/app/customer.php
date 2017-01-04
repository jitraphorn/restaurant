<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class log extends Model { // ชื่อ model
    public $timestamps = false;
    protected $table = 'log'; // ชื่อ table

}