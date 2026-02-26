<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class darba_uzdevums extends Model
{
    protected $table = 'darba_uzdevums';
    public $timestamps = false;
    protected $fillable = [
        'uzdevuma_kods', 'status', 'klienta_id','aprikojuma_nosaukums','aprikojuma_tips_id','uznemsanas_adrese','uznemsanas_dt',
        'piegades_adrese','piegades_dt','piegades_darbinieks','piegades_transports','attalums_km','liguma_termins',
        'pakalpojuma_apraksts','uzstadisanas_darbinieks','uzstadisanas_dt','uzstadisanas_komentars','faila_tips','faila_cels','cena','atbildigais_darbnieks_id','parole','komentars'
    ];

    public function klients()
    {
        return $this->belongsTo(klients::class, 'klienta_id');
    }
}
