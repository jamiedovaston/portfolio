<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Project;

class ProjectsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        // Paginated list of projects
        $projects = Project::with('tags', 'categories')
            ->orderBy('created_at', 'desc')
            ->paginate(9); // 9 per page

        return view('projects.index', [
            'projects' => $projects,
        ])->layout('layouts.app');
    }
}
