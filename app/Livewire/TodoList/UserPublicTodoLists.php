<?php

namespace App\Livewire\TodoList;

use Livewire\Component;
use App\Models\TodoList;
use App\Models\User;

//http://127.0.0.1:8000/user/1/public-todo-lists/3

class UserPublicTodoLists extends Component
{
    public $user;
    public $publicTodoLists;
    public $selectedTodoListId;

    public function mount($user_id, $todo_list_id = null)
    {
        $this->user = User::find($user_id);

        if (!$this->user) {
            abort(404, 'Пользователь не найден');
        }

        // Если передан todo_list_id, то загружаем конкретный список, иначе все публичные
        if ($todo_list_id) {
            $this->publicTodoLists = TodoList::where('user_id', $this->user->id)
                                              ->where('is_public', true)
                                              ->where('id', $todo_list_id)
                                              ->get();
        } else {
            // Загружаем все публичные списки
            $this->publicTodoLists = TodoList::where('user_id', $this->user->id)
                                              ->where('is_public', true)
                                              ->get();
        }
    }

    public function render()
    {
        return view('livewire.todo-list.user-public-todo-lists', [
            'publicTodoLists' => $this->publicTodoLists,
            'user' => $this->user,
        ])
        ->extends('components.layouts.app')
        ->section('content');
    }
}
