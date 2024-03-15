<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**  
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mustahik', function (Blueprint $table) {
            $table->id(); 
            $table->date('tanggal');
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->string('jumlah_uang_diterima')->nullable(); 
            $table->string('jumlah_beras_diterima')->nullable();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); 
            $table->string('nomor_telp')->nullable();
            $table->string('rt_rw')->nullable(); 
            $table->string('alamat')->nullable(); 
            $table->string('kategori_mustahik')->nullable(); 
            $table->string('status_perkawinan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('jumlah_pendapatan')->nullable();
            $table->string('jumlah_bansos_diterima'->nullable();
            $table->integer('jumlah_anak_dalam_tanggungan')->nullable();
            $table->string('status_tempat_tinggal')->nullable();
            $table->string('pengeluaran_kontrakan')->nullable();
            $table->string('jumlah_hutang')->nullable();
            $table->string('keperluan_hutang')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();  
        }); 
    } 

    public function down()
    {
        Schema::dropIfExists('mustahik');
    }
};
