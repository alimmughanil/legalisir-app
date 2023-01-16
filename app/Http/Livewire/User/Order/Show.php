<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $data = [
            'title' => "Data Pesanan Spesifik"
        ];

        return view('livewire.user.order.show', compact('data'));
    }
}
