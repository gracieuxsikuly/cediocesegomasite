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
        Schema::create('documents_electroniques', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fichier');
            $table->text('motif')->nullable();
            $table->enum('type_document', ['dossier', 'plan_action', 'lettre', 'rapport', 'courriel', 'autre'])->default('autre');
            $table->enum('proprietaire_type', ['bureau_diocesain', 'doyenne', 'paroisse'])->default('bureau_diocesain');
            $table->foreignId('doyenne_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('paroisse_id')->nullable()->constrained()->nullOnDelete();
            $table->date('date_document')->nullable();
            $table->string('fichier');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents_electroniques');
    }
};
