<?php

namespace App\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\TodoList;

class TodoListTasksPublic extends Component
{
    public $todoListId;
    public $tasks = [];

    public function mount($todoListId)
    {
        $this->todoListId = $todoListId;
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::where('todo_list_id', $this->todoListId)->get();
    }

    public function render()
    {
        return view('livewire.task.todo-list-tasks-public');
    }
}
