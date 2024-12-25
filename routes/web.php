<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomeProjects;
use App\Livewire\ProjectsIndex;
use App\Livewire\ProjectsShow;
use App\Livewire\Portal;


Route::get('/', Portal::class)->name('home');

Route::get('/projects', ProjectsIndex::class)->name('projects.index');
Route::get('/projects/{id}', ProjectsShow::class)->name('projects.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
