<?php

namespace App\Http\Livewire\User\Legalize;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data = [
            'title' => "Data Legalisir Ijazah"
        ];

        return view('livewire.user.legalize.index', compact('data'));
    }
}
