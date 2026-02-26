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
        Schema::create('klients', function (Blueprint $table) {
            $table->id();
            $table->string('vards');
            $table->string('uzvards');
            $table->string('tel_num');
            $table->string('e_pasts')->unique();
            $table->string('adrese');
            $table->string('komentars');
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
