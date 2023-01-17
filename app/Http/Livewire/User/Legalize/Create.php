<?php

namespace App\Http\Livewire\User\Legalize;

use Livewire\Component;
use Livewire\WithFileUploads;
class Create extends Component
{
    public function render()
    {
        $data = [
            'title' => "Tambah Data Legalisir Baru"
        ];
        return view('livewire.user.legalize.create', compact('data'));
    }
}
