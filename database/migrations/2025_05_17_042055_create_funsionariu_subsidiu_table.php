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
        Schema::create('funsionariu_subsidiu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_funsionariu')->references('id')->on('funsionariu')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('id_subsidiu')->references('id')->on('subsidiu')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funsionariu_subsidiu');
    }
};
