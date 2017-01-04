<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class order extends Model { // ชื่อ model
    public $timestamps = false;
    protected $table = 'order'; // ชื่อ table

}