<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingNomor extends Model
{
    use HasFactory;

    protected $table = 'mapping_nomor';

    public $timestamps = false; // <--- ini penting agar Laravel tidak mencari updated_at/created_at

    protected $fillable = [
        'nomor_id',
        'campign_id', 
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campign_id', 'kode'); 
    }

    public function target()
    {
        return $this->belongsTo(Target::class, 'nomor_id', 'id');
    }
}
