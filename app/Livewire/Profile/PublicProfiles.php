<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class PublicProfiles extends Component
{
    public Collection $users;

    public function mount(): void
    {
        $this->users = User::where('status', 'Публичный')->get();
    }

    public function render()
    {
        return view('livewire.profile.public-profiles')
            ->extends('components.layouts.app')
            ->section('content');
    }
}
