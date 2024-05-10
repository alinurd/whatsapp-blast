<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirParent extends Model
{
    use HasFactory;
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function formulir()
    {
        return $this->hasMany(Formulir::class, 'formulir_parent')->orderBy('id');
    }
}
