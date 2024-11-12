<?php

namespace App\Livewire\Task;

use App\Models\Task;
use App\Models\TodoList;
use Livewire\Component;

class TaskList extends Component
{
    public $todoListId;
    public $tasks;
    public $todoListCreatedAt;

    public function mount($todoListId)
    {
        $this->todoListId = $todoListId;
        $this->loadTasks();
        $this->loadTodoListCreatedAt();
    }

    public function loadTasks()
    {
        $this->tasks = Task::where('todo_list_id', $this->todoListId)->get();
    }

    public function loadTodoListCreatedAt()
    {
        $todoList = TodoList::findOrFail($this->todoListId);
        $this->todoListCreatedAt = $todoList->created_at;
    }

    public function deleteTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.task.task-list')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
