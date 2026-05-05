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
        Schema::table('emission_radio_marias', function (Blueprint $table) {
            if (! Schema::hasColumn('emission_radio_marias', 'nombre_ecoutes')) {
                $table->unsignedBigInteger('nombre_ecoutes')->default(0)->after('statut');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emission_radio_marias', function (Blueprint $table) {
            if (Schema::hasColumn('emission_radio_marias', 'nombre_ecoutes')) {
                $table->dropColumn('nombre_ecoutes');
            }
        });
    }
};