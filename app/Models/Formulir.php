<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;

    public function option()
    {
        return $this->hasMany(FormulirOption::class, 'option_formulir_id');
    }
    
    public function jawaban()
    {
        return $this->hasMany(FormulirJawaban::class, 'formulir_id')->where('is_checkbox', 0)->orderBy('id');
    }
    
    public function jawabanOption()
    {
        return $this->hasMany(FormulirJawaban::class, 'formulir_id')->where('is_checkbox', 1)->orderBy('id');
    }

    public function parent()
    {
        return $this->belongsTo(FormulirParent::class, 'formulir_parent')->withDefault();
    }
}
