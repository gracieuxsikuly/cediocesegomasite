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
        Schema::create('doyennes', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('localisation');
            $table->string('responsable');
             $table->integer('nombreaproximatifmembre')->nullable();
            $table->enum('fonction',['zelateur','zelatrice']);
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doyennes');
    }
};
