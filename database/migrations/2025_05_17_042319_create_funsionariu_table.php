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
        Schema::create('funsionariu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_munisipiu')->references('id')->on('munisipiu')->restrictOnDelete()
            ->onUpdate('cascade');
            $table->foreignId('id_grau')->nullable()->references('id')->on('grau')->restrictOnDelete()
            ->onUpdate('cascade');
            $table->foreignId('id_espasu_servisu')->references('id')->on('espasu_servisu')->restrictOnDelete()
            ->onUpdate('cascade');
            $table->foreignId('id_regime')->nullable()->references('id')->on('regime_espesial')->restrictOnDelete()
            ->onUpdate('cascade');
            $table->string('naran_kompletu')->length(500);
            $table->enum('sexu', ['feto', 'mane']);
            $table->date('loron_moris');
            $table->string('email')->length(255)->unique();
            $table->integer('nu_telefone')->length(50)->unique(); 
            $table->enum('tipu_fun', ['geral', 'espesial']);
            $table->enum('nivel_edukasaun', ['primaria', 'pre_sekundariu', 'sekundariu', 'lisensiadu', 'mestradu', 'doutoramentu']);
            $table->string('titulu_akademiku')->nullable()->length(255);
            $table->enum('tipu_kontratu', ['kontratadu', 'permanente']);
            $table->string('pozisaun')->length(255);
            $table->enum('status', ['ativu', 'suspensa', 'inativu']);
            $table->date('start_work');
            $table->date('end_work')->nullable();
            $table->string('pmis')->length(50);
            $table->integer('payroll')->length(50)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funsionariu');
    }
};
