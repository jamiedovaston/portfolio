<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'icon',
        'name',
        'link',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
