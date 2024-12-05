<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeLang extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'name',
        'slug',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
