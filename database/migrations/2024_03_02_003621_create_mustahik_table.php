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
            $table->enum('kategori_menerima_zakat', ['fitrah', 'maal', 'fidyah', 'infaq'])->nullable();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); 
            $table->string('nomor_telp')->nullable();
            $table->string('alamat')->nullable(); 
            $table->enum('kategori_mustahik', ['fakir', 'miskin', 'gharim', 'ibnu sabil', 'mualaf']);
            $table->enum('status_perkawinan', ['belum menikah', 'menikah', 'janda cerai', 'janda wafat']);
            $table->string('pekerjaan')->nullable();
            $table->decimal('jumlah_pendapatan', 10, 2)->nullable();
            $table->decimal('jumlah_bansos_diterima', 10, 2)->nullable();
            $table->integer('jumlah_anak_dalam_tanggungan')->nullable();
            $table->enum('status_tempat_tinggal', ['kontrak', 'menumpang', 'milik sendiri'])->nullable();
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
