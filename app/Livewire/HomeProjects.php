<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class HomeProjects extends Component
{
    public function render()
    {
        // Fetch featured projects (add a mechanism to mark projects as 'featured' or just limit results)
        $featuredProjects = Project::with('tags', 'categories')
            ->orderBy('created_at', 'desc')
            ->take(6) // Adjust the number of projects here
            ->get();

        return view('projects.projects', [
            'featuredProjects' => $featuredProjects,
        ]);
    }
}
