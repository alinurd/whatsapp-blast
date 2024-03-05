<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'muzakki';

    protected $fillable = [
        'nama_lengkap',
        'tanggal_transaksi',
        'jumlah_bayar',
        'keterangan',
        'kategori_id',
    ];
}  
