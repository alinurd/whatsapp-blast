<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirJawaban extends Model
{
    use HasFactory;

    public function jawabanOption()
    {
        return $this->where('is_checkbox', 1)->orderBy('id');
    }

    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'formulir_id', 'id')->withDefault();
    }

    public function option()
    {
        $this->belongsTo(FormulirOption::class, 'checkbox_id', 'id');
    }
}
