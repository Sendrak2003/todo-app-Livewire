<?php

namespace App\Livewire\TodoList;

use Livewire\Component;
use App\Models\TodoList;
use \App\Models\User;
use Illuminate\Support\Collection;

class TodoListManager extends Component
{
    public User $user;

    public function mount(): void
    {
        $this->user = auth()->user();
    }

    public function deleteList(int $todoListId): void
    {
        $todoList = TodoList::findOrFail($todoListId);
        $todoList->delete();
    }

    public function render(): \Illuminate\View\View
    {
        $todoLists = TodoList::where('user_id', $this->user->id)->get();

        return view('livewire.todo-list.todo-list-manager', [
            'todoLists' => $todoLists,
            'user' => $this->user,
        ])
        ->extends('components.layouts.app') 
        ->section('content');
    }
}
