<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingNomor extends Model
{
    protected $table = 'map_nomors';

    use HasFactory;
    protected $fillable = [
        'nama',
        'kategori',
        'pesan',
        'created_by '
    ];
}
