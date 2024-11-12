<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class ProfileUpdate extends Component
{
    use WithFileUploads;  // Для работы с загрузкой файлов

    public $name;
    public $surname;
    public $email;
    public $login;
    public $photo;
    public $status;

    // Метод для инициализации данных
    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->surname = $user->surname;
        $this->email = $user->email;
        $this->login = $user->login;
        $this->status = $user->status;
    }

    // Метод обновления профиля
    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'login' => 'required|string|max:255|unique:users,login,' . auth()->id(),
            'photo' => 'nullable|image|max:1024',
            'status' => 'required|in:Публичный,Приватный',
        ], [
            'name.required' => 'Имя обязательно для заполнения.',
            'surname.required' => 'Фамилия обязательна для заполнения.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Введите корректный email.',
            'email.unique' => 'Этот email уже зарегистрирован.',
            'login.required' => 'Логин обязателен для заполнения.',
            'login.unique' => 'Этот логин уже используется.',
            'photo.image' => 'Загруженный файл должен быть изображением.',
            'photo.max' => 'Размер изображения не должен превышать 1 МБ.',
            'status.required' => 'Статус профиля обязателен.',
            'status.in' => 'Выберите корректный статус профиля: публичный или приватный.',
        ]);

        // Обновляем профиль пользователя
        auth()->user()->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'login' => $this->login,
            'status' => $this->status,
        ]);

        if ($this->photo) {
            $path = $this->photo->store('avatars', 'public');
            $user = auth()->user();
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->route('todo.list.manager');
    }

    public function render()
    {
        return view('livewire.profile.profile-update')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
