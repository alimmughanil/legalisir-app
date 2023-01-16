<?php

namespace App\Http\Livewire\User\Legalize;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $data = [
            'title' => "Buat Data Legalisir Baru"
        ];
        return view('livewire.user.legalize.create', compact('data'));
    }
}
