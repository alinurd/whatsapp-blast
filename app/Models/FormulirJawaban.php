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
}
