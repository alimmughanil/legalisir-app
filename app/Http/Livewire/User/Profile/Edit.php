<?php

namespace App\Http\Livewire\User\Profile;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $data = [
            'title' => "Edit Data Profil Saya"
        ];
        return view('livewire.user.profile.edit', compact('data'));
    }
}
