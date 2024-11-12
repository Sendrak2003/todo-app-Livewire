<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail; // Убедитесь, что класс почтового сообщения подключен

class ResetPassword extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;
    public $status;

    protected $rules = [
        'email' => 'required|email|max:255||exists:users,email',
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
    ];
    
    protected $messages = [
        'email.required' => 'Email обязателен для заполнения.',
        'email.email' => 'Введите действительный адрес электронной почты.',
        'email.max' => 'Email не может быть длиннее 255 символов.',
        'email.exists' => 'Нет такого email.',
        
        'password.required' => 'Пароль обязателен для заполнения.',
        'password.string' => 'Пароль должен быть строкой.',
        'password.min' => 'Пароль должен содержать не менее 6 символов.',
        'password.max' => 'Пароль не может быть длиннее 32 символов.',
        'password.regex' => 'Пароль должен содержать хотя бы одну заглавную букву, одну строчную букву, цифру и специальный символ.',
        
        'password_confirmation.required' => 'Подтверждение пароля обязательно.',
        'password_confirmation.string' => 'Подтверждение пароля должно быть строкой.',
        'password_confirmation.same' => 'Подтверждение пароля не совпадает с паролем.',
    ];
    

    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function resetPassword()
    {
        $this->validate();

        // Проверка, существует ли запись в таблице password_resets для этого токена и email
        $resetRecord = DB::table('password_resets')->where('email', $this->email)->where('token', $this->token)->first();

        if ($resetRecord) {
            $user = User::where('email', $this->email)->first();

            if ($user) {
                $user->password = Hash::make($this->password);
                $user->save();

                DB::table('password_resets')->where('email', $this->email)->delete();

                $resetLink = route('login');
              //  Mail::to($this->email)->send(new PasswordResetMail($resetLink));

                $this->status = 'Пароль успешно сброшен!';

                // Опционально: можно перенаправить пользователя на страницу входа или другие действия
                return redirect()->route('login');
            } else {
                $this->status = 'Пользователь с таким email не найден.';
            }
        } else {
            $this->status = 'Неверный токен или ссылка для сброса пароля.';
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
