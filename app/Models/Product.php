<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */ 
    protected $table = 'product';

    protected $fillable = [
        'kategori_id',
        'jenis_produk',
        'gambar',
        'nama_product',
        'desk_detail',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
