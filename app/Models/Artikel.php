<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    protected $fillable = [
        'judul', 'slug', 'konten', 'foto', 'kategori',
        'penulis', 'tgl_publikasi', 'status', 'aktif',
    ];

    protected static function booted()
    {
        static::creating(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul);
            }
        });
    }
}
