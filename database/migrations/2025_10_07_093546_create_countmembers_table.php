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
        Schema::create('countmembers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('count-croisillons');
            $table->integer('count-feunouveau');
            $table->integer('count-cadets');
            $table->integer('count-equap');
            $table->date('annee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countmembers');
    }
};
