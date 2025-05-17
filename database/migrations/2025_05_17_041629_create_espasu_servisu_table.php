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
        Schema::create('espasu_servisu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_diresaun')->references('id')->on('diresaun')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('fatin_servisu')->length(255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espasu_servisu');
    }
};
