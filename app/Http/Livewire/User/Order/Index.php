<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;

class Index extends Component
{
    public $active = "Semua Pesanan";

    public function setActive($state){
        return $this->active = $state;
    }
    public function render()
    {
        $data = [
            'title' => "Data Pesanan Saya"
        ];

        return view('livewire.user.order.index', compact('data'));
    }
}
