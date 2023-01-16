<?php

namespace App\Http\Livewire\User\Legalize;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        // Pakai Model Binding
        $data = [
            'title' => "Data Legalisir"
        ];

        return view('livewire.user.legalize.show', compact('data'));
    }
}
