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
        Schema::create('activiteprogrammes', function (Blueprint $table) {
            $table->id();
             $table->string('titre');
            $table->text('description');
            $table->date('dateactivite')->nullable();
            $table->string('emplacement')->nullable();
            $table->enum('typeactivite',['Jeudi saint','Pie X','Investiture','Aspiranant','Promesse',
            'Journee eucharistique','Sesssion paroiciale',
            'Session decanale','Session diocesaine','Jeudi Adoration','Christ Roi','Autre'])->nullable();
              $table->string('image1');
              $table->string('image2')->nullable();
              $table->string('image3')->nullable();
              $table->enum('statut',['en attente','effectif'])->nullable();
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
        Schema::dropIfExists('activiteprogrammes');
    }
};
