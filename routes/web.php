<?php

use Livewire\Volt\Volt;

Volt::route('/', \App\Livewire\Auth\Login::class)->name('login');
Volt::route('/logout', \App\Livewire\Auth\Logout::class)->name('logout');
Volt::route('/register', \App\Livewire\Auth\Register::class)->name('register');
Volt::route('/forgot-password', \App\Livewire\Auth\ForgotPassword::class)
      ->name('password.request');
Volt::route('password/reset/{token}/{email}', \App\Livewire\Auth\ResetPassword::class)
      ->name('password.reset');

Volt::route('/todo-list-manager', \App\Livewire\TodoList\TodoListManager::class)
      ->name('todo.list.manager')
      ->middleware('auth');
Volt::route('/create-todo-list', \App\Livewire\TodoList\CreateTodoList::class)
      ->name('create.todo.list')
      ->middleware('auth');
Volt::route('/todo-list/edit/{todoListId}',
      \App\Livewire\TodoList\EditTodoList::class)
      ->name('todo.list.edit');
Volt::route('/user/{user_id}/public-todo-lists/{todo_list_id?}',
      \App\Livewire\TodoList\UserPublicTodoLists::class)
      ->name('user.public.todo.lists');  
Volt::route('/todo-list/{todoListId}/tasks', \App\Livewire\Task\TaskList::class)
      ->name('task.list')
      ->middleware('auth');
Volt::route('/todo-list/{todoListId}/tasks/create', \App\Livewire\Task\CreateTask::class)
      ->name('task.create')
      ->middleware('auth');
Volt::route('/task/{task}', \App\Livewire\Task\TaskProfile::class)
      ->name('task.show')
      ->middleware('auth');
Volt::route('/task/{task}/edit', \App\Livewire\Task\TaskEdit::class)
      ->name('task.edit')
      ->middleware('auth');
Volt::route('/profile', \App\Livewire\Profile\ProfileUser::class)
      ->name('profile')
      ->middleware('auth'); 
Volt::route('/profile/update', \App\Livewire\Profile\ProfileUpdate::class)
      ->name('profile.update')
      ->middleware('auth');
Volt::route('/public-profiles', \App\Livewire\Profile\PublicProfiles::class)
      ->name('public.profiles');
Volt::route('/profile/{userId}', \App\Livewire\Profile\PublicProfile::class)
      ->name('public.profile');

