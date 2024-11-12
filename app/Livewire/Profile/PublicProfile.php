<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublicProfile extends Component
{
    public User $user;
    public string $errorMessage = '';
    public int $taskCount = 0;
    public int $todoListCount = 0;

    public function mount(int $userId): void
    {
        try {
            $this->user = User::where('id', $userId)->where('status', 'Публичный')->firstOrFail();
            $this->todoListCount = $this->user->todoLists->count(); 
            $this->taskCount = $this->user->todoLists->sum(function ($todoList) {
                return $todoList->tasks->count();
            });
        } catch (ModelNotFoundException $e) {
            $this->errorMessage = 'Профиль не найден или недоступен.';
        }
    }

    public function render()
    {
        return view('livewire.profile.public-profile')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
