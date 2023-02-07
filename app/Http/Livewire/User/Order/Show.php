<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;

class Show extends Component
{
    public $order;
    public function render()
    {
        return view('livewire.user.order.show');
    }
}