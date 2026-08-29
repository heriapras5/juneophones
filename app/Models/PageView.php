<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    protected $fillable = [
        'ip_address',
        'url',
        'user_agent',
        'visited_at',
    ];

    public $timestamps = false;
}
