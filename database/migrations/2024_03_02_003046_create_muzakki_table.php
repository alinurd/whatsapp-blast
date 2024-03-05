<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  
{
    public function up()
    {
        Schema::create('muzakki', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->date('tanggal_transaksi');
            $table->decimal('jumlah_bayar', 8, 2);
            $table->string('keterangan')->nullable();
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->timestamps();
        });
    }  
  
    public function down() 
    {
        Schema::dropIfExists('muzakki');
    }
};
