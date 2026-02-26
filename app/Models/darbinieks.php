<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


// class darbinieks extends Model
// {
//     protected $table = 'darbinieks';
//     public $timestamps = false;
//     protected $fillable = ['vards','uzvards','dzimsanas_d','darba_uzsaka_d','amati_id','tel_num','e_pasts','lietotajvards','parole','komentars'];

// }

class darbinieks extends Authenticatable
{
    use Notifiable;

    protected $table = 'darbinieks';

    protected $fillable = [
        'lietotajvards',
        'parole',
    ];

    protected $hidden = [
        'parole',
    ];


    public function getAuthPassword()
    {
        return $this->parole;
    }
}
