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
            $table->string('code')->unique(); 
            $table->date('tanggal');
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->string('jumlah_uang_diterima')->nullable(); 
            $table->string('jumlah_beras_diterima')->nullable();
            $table->string('satuan_beras')->nullable();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); 
            $table->string('nomor_telp');
            $table->foreignId('rw_id')->constrained('rw'); 
            $table->string('wilayah_lain')->nullable(); 
            $table->string('alamat');  
            $table->string('kategori_mustahik'); 
            $table->string('status_perkawinan');
            $table->string('pekerjaan'); 
            $table->string('jumlah_pendapatan');
            $table->string('jumlah_bansos_diterima');
            $table->integer('jumlah_anak_dalam_tanggungan');
            $table->string('status_tempat_tinggal');
            $table->string('pengeluaran_kontrakan')->nullable();
            $table->string('pengeluaran_listrik')->nullable();
            $table->string('jumlah_hutang');
            $table->string('keperluan_hutang'); 
            $table->string('keterangan')->nullable();
            $table->timestamps();    
        }); 
    } 

    public function down()
    {
        Schema::dropIfExists('mustahik');
    }
};
