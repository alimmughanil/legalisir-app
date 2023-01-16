<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data = [
            'title' => "Profil Saya"
        ];
        return view('livewire.user.profile.index', compact('data'));
    }
}
