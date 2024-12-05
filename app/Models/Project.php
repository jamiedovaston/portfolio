<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'featured',
        'name',
        'description',
        'body_text',
        'slug',
        'code_lang_id',
        'repo',
        'itch_page',
        'tags',
        'order'
    ];

    protected $casts = [
        'tags' => 'array', // Cast tags as an array
    ];

    // Ensure default order is by `order` column
    protected static function booted()
    {
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('order');
        });
    }

    public function customLinks()
    {
        return $this->hasMany(CustomLink::class);
    }

    public function codeLang()
    {
        return $this->belongsTo(CodeLang::class);
    }
}
