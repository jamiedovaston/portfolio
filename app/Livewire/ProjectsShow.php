<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectsShow extends Component
{
    public $project;

    public function mount($id)
    {
        // Fetch a single project by id (or use a slug if available)
        $this->project = Project::with('tags', 'categories')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.projects-show', [
            'project' => $this->project,
        ]);
    }
}
