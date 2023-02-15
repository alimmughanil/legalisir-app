<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $data = [
            'title' => "Lengkapi Data Profil Saya"
        ];
        return view('livewire.user.profile.create', compact('data'));
    }
}