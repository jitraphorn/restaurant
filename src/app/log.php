<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class user extends Model { // ชื่อ model
    public $timestamps = false;
    protected $table = 'user'; // ชื่อ table

}