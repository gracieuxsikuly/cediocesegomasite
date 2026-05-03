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
        Schema::create('mouvements_financiers', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['revenu', 'depense']);
            $table->string('designation');
            $table->text('motif')->nullable();
            $table->decimal('montant', 12, 2);
            $table->date('date_operation');
            $table->enum('mode_paiement', ['espece', 'mobile_money', 'banque', 'autre'])->default('espece');
            $table->string('reference')->nullable();
            $table->string('piece_jointe')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvements_financiers');
    }
};
