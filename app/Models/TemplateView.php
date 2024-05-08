<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateView extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'template_view';

    protected $fillable = [
        'nama_template',
        'nama_kategori', 
        'creted_by', 
        'creted_at', 
    ];

}  
