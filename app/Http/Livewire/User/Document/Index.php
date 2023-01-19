<?php

namespace App\Http\Livewire\User\Document;

use Livewire\Component;

class Index extends Component
{
    public $active = "Ijazah";
    public $document;

    public function setActive($state){
        return $this->active = $state;
    }

    public function render()
    {
        $data = [
            'title' => "Data Legalisir Ijazah"
        ];

        return view('livewire.user.document.index', compact('data'));
    }
}
