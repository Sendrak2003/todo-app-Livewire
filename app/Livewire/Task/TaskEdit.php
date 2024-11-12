<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class TaskEdit extends Component
{
    public Task $task;
    public string $name;
    public ?string $description = null;
    public string $status = "Публичный";
    public ?string $message = null;
    public string $creationDate;

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

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->name = $task->name;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->creationDate = $task->created_at->format('Y-m-d');
    }

    public function update(): void
    {
        $validatedData = $this->validate();

        $this->task->update([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ]);

        $this->message = 'Задача успешно обновлена!';
        $this->redirect(route('task.show', ['task' => $this->task->id]));
    }

    public function render()
    {
        return view('livewire.task.task-edit', ['task' => $this->task, 'creationDate' => $this->creationDate])
            ->extends('components.layouts.app')
            ->section('content');
    }
}
