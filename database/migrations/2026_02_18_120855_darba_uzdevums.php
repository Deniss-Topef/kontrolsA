<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('darba_uzdevums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klienta_id')->constrained('klients', 'id');
            $table->string('aprikojuma_nosaukums');
            $table->foreignId('aprikojuma_tips_id')->constrained('aprikojuma_tipi', 'id');
            $table->string('uznemsanas_adrese');
            $table->datetime('uznemsanas_dt');
            $table->string('piegades_adrese');
            $table->datetime('piegades_dt');
            $table->foreignId('piegades_darbinieks')->constrained('darbinieks', 'id');
            $table->string('piegades_transports');
            $table->float('attalums_km');
            $table->datetime('liguma_termins');
            $table->text('pakalpojuma_apraksts');
            $table->foreignId('uzstadisanas_darbinieks')->constrained('darbinieks', 'id');
            $table->datetime('uzstadisanas_dt');
            $table->text('uzstadisanas_komentars');
            $table->string('faila_tips');
            $table->string('faila_cels');
            $table->float('cena');
            $table->text('komentars');
            $table->foreignId('atbildigais_darbinieks_id')->constrained('darbinieks', 'id');
            $table->string('status');
            $table->string('uzdevuma_kods');
            $table->string('parole');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
