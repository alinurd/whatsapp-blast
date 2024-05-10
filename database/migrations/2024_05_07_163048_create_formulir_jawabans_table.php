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
        Schema::create('formulir_jawabans', function (Blueprint $table) {
            $table->id();
            $table->integer('formulir_id');
            $table->integer('parent_id')->nullable();
            $table->string('variabel');
            $table->text('jawaban')->nullable();
            $table->integer('is_checkbox')->default(0);
            $table->integer('checkbox_id')->nullable();
            $table->integer('uuid')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_jawabans');
    }
};
