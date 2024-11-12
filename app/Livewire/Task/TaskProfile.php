<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class TaskProfile extends Component
{
    public Task $task;

    public function mount(Task $task): void
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.task.task-profile', ['task' => $this->task])
            ->extends('components.layouts.app')
            ->section('content');
    }
}
