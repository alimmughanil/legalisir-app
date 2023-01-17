<?php

namespace App\Http\Livewire\User\Legalize;

use Livewire\Component;

class Edit extends Component
{   
    public function render()
    {
        // Pakai Model Binding
        $data = [
            'title' => "Edit Data Legalisir"
        ];
        return view('livewire.user.legalize.edit', compact('data'))->extends('layouts.auth');
    }
}
