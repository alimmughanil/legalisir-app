<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $data = [
            'title' => "Buat Pesanan Legalisir Ijazah"
        ];
        return view('livewire.user.order.create', compact('data'));
    }
}
