<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class CreateTask extends Component
{
    public int $todoListId;
    public string $name;
    public ?string $description = null;
    public string $status = 'Публичный';
    public ?string $message = null;
    public string $creationDate;

    public function mount(int $todoListId): void
    {
        $this->todoListId = $todoListId;
        $this->creationDate = now()->format('Y-m-d'); 
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'status' => 'required|string|in:Публичный,Приватный,Завершённый,Отменённый',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Название задачи обязательно.',
            'name.string' => 'Название задачи должно быть строкой.',
            'name.max' => 'Название задачи не может превышать 255 символов.',
            'description.string' => 'Описание должно быть строкой.',
            'description.max' => 'Описание не может превышать 255 символов.',
            'status.required' => 'Выберите статус задачи.',
            'status.in' => 'Статус должен быть одним из следующих: Публичный, Приватный, Завершённый, Отменённый.',
        ];
    }

    public function save(): void
    {
        $validatedData = $this->validate();

        Task::create([
            'todo_list_id' => $this->todoListId,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        $this->message = 'Задача успешно добавлена!';
        $this->reset(['name', 'description', 'status']);
        $this->redirect(route('task.list', ['todoListId' => $this->todoListId]));
    }

    public function render()
    {
        return view('livewire.task.create-task', ['todoListId' => $this->todoListId, 'creationDate' => $this->creationDate])
            ->extends('components.layouts.app')
            ->section('content');
    }
}
