<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileUser extends Component
{ 
    public function render()
    {
        return view('livewire.profile.profile-user')
            ->extends('components.layouts.app') 
            ->section('content');
    }
}
