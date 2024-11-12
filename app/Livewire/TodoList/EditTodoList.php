<?php

namespace App\Livewire\TodoList;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\TodoList;

class EditTodoList extends Component
{
    public TodoList $todoList;
    public bool $is_public = false;
    public ?string $created_at = null;
    public ?string $status = null;

    public function mount(int $todoListId): void
    {
        $this->todoList = TodoList::findOrFail($todoListId);
        $this->created_at = Carbon::parse($this->todoList->created_at)->format('Y-m-d');
        $this->is_public = $this->todoList->is_public;
    }

    public function updateList(): void
    {
        $this->validate([
            'created_at' => 'required|date',
            'is_public' => 'boolean',
        ]);

        $this->todoList->update([
            'created_at' => $this->created_at,
            'is_public' => $this->is_public,
        ]);

        $this->status = 'Список успешно обновлен!';
        $this->redirect(route('todo.list.manager'));
    }
    
    public function render(): \Illuminate\View\View
    {
        return view('livewire.todo-list.edit-todo-list')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
