<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Fillable properties
    protected $fillable = [
        'name',
        'image',
        'primary_colour',
        'secondary_colour',
    ];

    /**
     * Relationship: Many-to-Many with Projects
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tag', 'tag_id', 'project_id');
    }
}
