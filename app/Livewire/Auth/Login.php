<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $emailOrUsername;
    public $password;
    
    protected $rules = [
        'emailOrUsername' => 'required|string',
        'password' => 'required|string|min:6',
    ];

    public function login()
    {
        $this->validate(); // Валидация данных формы

        $credentials = filter_var($this->emailOrUsername, FILTER_VALIDATE_EMAIL)
            ? ['email' => $this->emailOrUsername]
            : ['login' => $this->emailOrUsername];

        // Проверка логина
        if (Auth::attempt(array_merge($credentials, ['password' => $this->password]))) {
            // Если успешный логин, перенаправляем
            return redirect()->route('public.profiles');
        } else {
            // Если ошибка, выводим ошибку
            $this->addError('general', 'Неверный логин или пароль.');
        }
    }

    public function render()
    {
        $user = Auth::user();

        if($user) {
            Auth::logout();
        }

        return view('livewire.auth.login')
        ->extends('components.layouts.app') 
        ->section('content'); 
    }
}

