<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class customer extends Model { // ชื่อ model
    public $timestamps = false;
    protected $table = 'customer'; // ชื่อ table

}