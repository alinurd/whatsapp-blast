<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responapi extends Model
{
    use HasFactory;

    protected $table = 'responapis';

    protected $fillable = [
         'ref_no',
         'status',
         'sent_date',
         'err_code',
    ];

    
    public function logMessages()
    {
        return $this->hasMany(LogMsg::class, 'ref_no', 'ref_no');
    }
    
}
