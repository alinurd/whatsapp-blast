<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  
{
    public function up()
    {
        Schema::create('transaksi_bayar_zakat', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_transaksi_bayar');
            $table->decimal('jumlah_transaksi_bayar', 8, 2);
            $table->string('ket')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->timestamps();
        });
    } 
 
    public function down()
    {
        Schema::dropIfExists('transaksi_bayar_zakat');
    }
};
