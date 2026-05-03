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
        if (Schema::hasTable('sliders')) {
            return;
        }

        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('sous_titre')->nullable();
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('bouton_texte')->nullable();
            $table->string('bouton_lien')->nullable();
            $table->string('bouton_secondaire_texte')->nullable();
            $table->string('bouton_secondaire_lien')->nullable();
            $table->integer('ordre')->default(1);
            $table->enum('statut', ['actif', 'inactif'])->default('actif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
