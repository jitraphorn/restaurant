<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class table extends Model { // ชื่อ model
    public $timestamps = false;
    protected $table = 'table'; // ชื่อ table

}