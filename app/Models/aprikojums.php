<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aprikojums extends Model
{
    protected $table = 'aprikojuma_tipi';
    public $timestamps = false;
    protected $fillable = ['tips'];
}
