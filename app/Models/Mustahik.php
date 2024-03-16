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
        'code', 
        'tanggal', 
        'kategori_id',
        'jumlah_beras_diterima',
        'jumlah_uang_diterima',
        'satuan_beras',
        'nama_lengkap', 
        'jenis_kelamin', 
        'nomor_telp',
        'rt_rw',
        'wilayah_lain',
        'alamat',
        'kategori_mustahik',  
        'status_perkawinan',
        'pekerjaan',
        'jumlah_pendapatan',
        'jumlah_bansos_diterima',
        'jumlah_anak_dalam_tanggungan',
        'status_tempat_tinggal',
        'pengeluaran_kontrakan',
        'pengeluaran_listrik', 
        'jumlah_hutang',
        'keperluan_hutang',
        'keterangan',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
