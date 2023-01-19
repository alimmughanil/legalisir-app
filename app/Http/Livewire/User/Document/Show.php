<?php

namespace App\Http\Livewire\User\Document;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        // Pakai Model Binding
        $data = [
            'title' => "Data Legalisir"
        ];

        return view('livewire.user.document.show', compact('data'));
    }
}
