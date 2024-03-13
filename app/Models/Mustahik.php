<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mustahik extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'mustahik';

    protected $fillable = [
        'tanggal', 
        'kategori_id',
        'jumlah_diterima',
        'nama_lengkap', 
        'jenis_kelamin', 
        'nomor_telp',
        'rt_rw',
        'alamat',
        'kategori_mustahik', 
        'status_perkawinan',
        'pekerjaan',
        'jumlah_pendapatan',
        'jumlah_bansos_diterima',
        'jumlah_anak_dalam_tanggungan',
        'status_tempat_tinggal',
        'pengeluaran_kontrakan',
        'jumlah_hutang',
        'keperluan_hutang',
        'keterangan',
    ];
}
