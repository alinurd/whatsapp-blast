<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nomor',
        'ket',
        'push',
        'status',
        'created_by '
    ];
}

