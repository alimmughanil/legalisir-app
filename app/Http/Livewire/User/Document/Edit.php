<?php

namespace App\Http\Livewire\User\Document;

use Livewire\Component;

class Edit extends Component
{   
    public function render()
    {
        // Pakai Model Binding
        $data = [
            'title' => "Edit Data Legalisir"
        ];
        return view('livewire.user.document.edit', compact('data'))->extends('layouts.auth');
    }
}
