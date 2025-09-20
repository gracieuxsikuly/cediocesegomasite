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
        Schema::create('photo_videos', function (Blueprint $table) {
            $table->id();
             $table->string('designation');
            $table->string('localisation');
            $table->string('liens');
             $table->foreignId('doyenne_id')->constrained()->onDelete('cascade');
             $table->foreignId('paroisse_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_videos');
    }
};
