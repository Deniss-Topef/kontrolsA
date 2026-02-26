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
        Schema::create('darbinieks', function (Blueprint $table) {
            $table->id();
            $table->string('vards');
            $table->string('uzvards');
            $table->date('dzimsanas_d');
            $table->date('darba_uzsaka_d');
            $table->foreignId('amati_id')->constrained('amati', 'id');
            $table->string('tel_num');
            $table->string('e_pasts')->unique();
            $table->string('lietotajvards')->unique();
            $table->string('parole');
            $table->string('komentars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('darbinieks');
    }
};
