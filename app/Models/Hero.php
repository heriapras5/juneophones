<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'heroes';

    protected $fillable = [
        'judul',
        'subjudul',
        'tagline',
        'badge',
        'gambar_bg',
        'cta_text',
        'cta_link',
        'urutan',
        'aktif',
    ];

    protected function casts(): array
    {
        return [
            'aktif' => 'boolean',
        ];
    }
}
