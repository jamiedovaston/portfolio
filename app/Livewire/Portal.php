<?php

namespace App\Livewire;

use Livewire\Component;

class Portal extends Component
{
    public function render()
    {
        return view('portal')->layout('layouts.app');
    }
}
