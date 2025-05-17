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
        Schema::create('regime_espesial', function (Blueprint $table) {
            $table->id();
            $table->string('naran_regime')->length(255);
            $table->string('grau_regime')->length(255);
            $table->decimal('salariu', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regime_espesial');
    }
};
