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
        if (Schema::hasTable('emission_radio_marias')) {
            return;
        }

        Schema::create('emission_radio_marias', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->date('date_emission');
            $table->foreignId('paroisse_id')->constrained()->onDelete('cascade');
            $table->string('fichier_audio');
            $table->enum('statut', ['brouillon', 'publie'])->default('publie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emission_radio_marias');
    }
};
