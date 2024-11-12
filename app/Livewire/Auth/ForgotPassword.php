<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;

class ForgotPassword extends Component
{
    public $email;
    public $status;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
    ];

    protected $messages = [
        'email.required' => 'Email обязателен для заполнения.',
        'email.email' => 'Введите действительный адрес электронной почты.',
        'email.exists' => 'Пользователь с таким email не найден.',
    ];

    public function sendResetLink()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user) {
            $token = Str::random(60);

            DB::table('password_resets')->updateOrInsert(
                ['email' => $this->email],
                ['token' => $token, 'created_at' => now()]
            );

            $resetLink = route('password.reset', ['token' => $token, 'email' => $this->email]);

            //Mail::to($this->email)->send(new PasswordResetMail($resetLink));

            $this->status = 'Ссылка для сброса пароля отправлена на ваш email.';
            return redirect()->route('password.reset', ['token' => $token, 'email' => $this->email]);

        } else {
            $this->status = 'Пользователь с таким email не найден.';
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
