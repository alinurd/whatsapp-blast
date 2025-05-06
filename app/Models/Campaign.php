<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table = 'campign';

    protected $fillable = [
        'kode',
        'nama',
        'status',
        'created_by'
    ];
}

