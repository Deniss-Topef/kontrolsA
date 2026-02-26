<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class klients extends Model
{
    protected $table = 'klients';
    public $timestamps = false;
    protected $fillable = ['vards','uzvards','tel_num','e_pasts','adrese','komentars'];
}
