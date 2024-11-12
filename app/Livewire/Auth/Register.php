<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $login;
    public $name;
    public $surname;
    public $email;
    public $password;
    public $password_confirmation;
    public $photo;

    public function register()
    {
        $this->validate([
            'login' => [
                'required',
                'string',
                'unique:users,login',
                'min:6',
                'max:10',
                'regex:/^[a-zA-Z0-9]+$/u'
            ],
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:6',
                'max:32',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[_#?!@$%^&*-]).{8,32}$/'
            ],
            'password_confirmation' => [
                'required',
                'string',
                'same:password'
            ],
            'photo' => 'nullable|image|max:1024', // 1 MB Max
        ], [
            'login.required' => 'Логин обязателен для заполнения.',
            'login.string' => 'Логин должен быть строкой.',
            'login.unique' => 'Этот логин уже занят.',
            'login.min' => 'Логин должен быть не короче 6 символов.',
            'login.max' => 'Логин не может превышать 10 символов.',
            'login.regex' => 'Логин должен содержать только буквы и цифры.',
            
            'name.required' => 'Имя обязательно для заполнения.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не может быть длиннее 255 символов.',
            
            'surname.required' => 'Фамилия обязательна для заполнения.',
            'surname.string' => 'Фамилия должна быть строкой.',
            'surname.max' => 'Фамилия не может быть длиннее 255 символов.',
            
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Введите действительный адрес электронной почты.',
            'email.max' => 'Email не может быть длиннее 255 символов.',
            'email.unique' => 'Этот email уже занят.',
            
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать не менее 6 символов.',
            'password.max' => 'Пароль не может быть длиннее 32 символов.',
            'password.regex' => 'Пароль должен содержать хотя бы одну заглавную букву, одну строчную букву, цифру и специальный символ.',
            
            'password_confirmation.required' => 'Подтверждение пароля обязательно.',
            'password_confirmation.string' => 'Подтверждение пароля должно быть строкой.',
            'password_confirmation.same' => 'Подтверждение пароля не совпадает с паролем.',
            
            'photo.image' => 'Фото должно быть изображением.',
            'photo.max' => 'Размер изображения не должен превышать 1 MB.',
        ]);

        // Сохранение пользователя
        $user = User::create([
            'login' => $this->login,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Загрузка фото, если есть
        if ($this->photo) {
            $path = $this->photo->store('avatars', 'public');
            $user->avatar = $path;
            $user->save();
        }

        // Вход пользователя
        Auth::login($user);

        $token = $user->createToken('Todo')->plainTextToken;

        return redirect()->route('public.profiles');
    }

    public function render()
    {
        $user = Auth::user();

        if($user) {
            Auth::logout();
        }
        
        return view('livewire.auth.register', [
            'user' => auth()->user(),
        ])
        ->extends('components.layouts.app')
        ->section('content');
    }
}
