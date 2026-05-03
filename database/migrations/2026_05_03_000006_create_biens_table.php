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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_bien_id')->constrained('categories_biens')->cascadeOnDelete();
            $table->string('designation');
            $table->string('reference')->nullable();
            $table->text('description')->nullable();
            $table->integer('quantite')->default(1);
            $table->enum('etat', ['neuf', 'bon', 'moyen', 'a_reparer', 'hors_service'])->default('bon');
            $table->string('localisation')->nullable();
            $table->enum('proprietaire_type', ['bureau_diocesain', 'doyenne', 'paroisse'])->default('bureau_diocesain');
            $table->foreignId('doyenne_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('paroisse_id')->nullable()->constrained()->nullOnDelete();
            $table->date('date_acquisition')->nullable();
            $table->decimal('valeur_estimee', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
