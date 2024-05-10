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
        Schema::create('formulir_options', function (Blueprint $table) {
            $table->id();
            $table->integer('option_formulir_id');
            $table->integer('option_parent_id')->nullable();
            $table->string('option_soal');
            $table->integer('option_jawaban')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_options');
    }
};
