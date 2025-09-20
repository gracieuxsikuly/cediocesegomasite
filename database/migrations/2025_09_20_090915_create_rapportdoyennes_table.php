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
        Schema::create('rapportdoyennes', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('annee');
             $table->date('dateenvoi');
            $table->string('lienfichier');
            $table->string('envoyer_par');
             $table->foreignId('doyenne_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapportdoyennes');
    }
};
