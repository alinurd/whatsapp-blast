<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogMsg extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 
    protected $table = 'log_messages';

    protected $fillable = [
        'ref_no',
        'destination',
        'status',
        'sender',
        'is_group',
        'sent_date',
        'read_date',
        'delivered_date',
        'create_date',
        'message',
        'caption',
        'queue',
        'media_url',
    ];
    
}
