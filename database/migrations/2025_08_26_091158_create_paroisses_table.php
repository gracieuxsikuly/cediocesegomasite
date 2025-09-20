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
        Schema::create('paroisses', function (Blueprint $table) {
            $table->id();
             $table->string('designation');
            $table->string('localisation');
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('responsable');
            $table->enum('fonction',['zelateur','zelatrice']);
            $table->string('contact')->nullable();
            $table->integer('nombreaproximatifmembre')->nullable();
             $table->foreignId('doyenne_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paroisses');
    }
};
