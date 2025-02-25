<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Fillable properties
    protected $fillable = [
        'title',
        'description',
        'images',
        'video',
        'background_image',
        'body',
        'links',
        'position',
    ];

    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true, // Puts new projects at the end of the list
    ];

    // Cast attributes to handle JSON fields
    protected $casts = [
        'images' => 'array', // Store the list of images as JSON
        'links' => 'array', // Store links data as JSON
    ];

    /**
     * Relationship: Many-to-Many with Tags
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project_tag', 'project_id', 'tag_id');
    }

    /**
     * Relationship: Many-to-Many with Categories
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_project', 'project_id', 'category_id');
    }
}
