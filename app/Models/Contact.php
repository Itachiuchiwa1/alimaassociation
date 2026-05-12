<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'question',
        'is_anonymous',
        'is_read',
        'replied_at',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'is_read' => 'boolean',
        'replied_at' => 'datetime',
    ];
}
