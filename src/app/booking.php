<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class booking extends Model { // ชื่อ model
    public $timestamps = false;
    protected $table = 'booking'; // ชื่อ table
}