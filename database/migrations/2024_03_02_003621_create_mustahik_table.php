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
            $table->decimal('jumlah_diterima', 8, 2)->nullable();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); 
            $table->string('nomor_telp')->nullable();
            $table->string('rt_rw')->nullable(); 
            $table->string('alamat')->nullable(); 
            $table->string('kategori_mustahik')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->decimal('jumlah_pendapatan', 10, 2)->nullable();
            $table->decimal('jumlah_bansos_diterima', 10, 2)->nullable();
            $table->integer('jumlah_anak_dalam_tanggungan')->nullable();
            $table->string('status_tempat_tinggal')->nullable();
            $table->decimal('pengeluaran_kontrakan', 10, 2)->nullable();
            $table->decimal('jumlah_hutang', 10, 2)->nullable();
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
