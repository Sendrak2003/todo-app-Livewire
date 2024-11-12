<?php

namespace App\Livewire\TodoList;

use Livewire\Component;
use App\Models\TodoList;
use Illuminate\Validation\Rule;

class CreateTodoList extends Component
{
    public bool $is_public = false;
    public ?string $status = null;
    public ?string $created_at = null;

    public function createList(): void
    {
        $this->validate([
            'is_public' => 'boolean',
            'created_at' => 'required|date|after_or_equal:today',
        ], [
            'created_at.after_or_equal' => 'Дата создания не может быть меньше сегодняшней.',
            'created_at.required' => 'Поле даты обязательно для заполнения.',
            'created_at.date' => 'Поле должно содержать корректную дату.',
        ]);

        TodoList::create([
            'user_id' => auth()->id(),
            'is_public' => $this->is_public,
            'created_at' => $this->created_at,
        ]);

        $this->status = 'Список дел успешно создан!';
        $this->reset(['is_public', 'created_at']);
        $this->redirect(route('todo.list.manager'));
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.todo-list.create-todo-list')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
