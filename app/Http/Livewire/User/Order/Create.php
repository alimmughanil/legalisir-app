<?php

namespace App\Http\Livewire\User\Order;

use Livewire\Component;

class Create extends Component
{
    public $active = "Data Pemesan";

    public function setActive($state){
        return $this->active = $state;
    }
    
    public function render()
    {
        return view('livewire.user.order.create');
    }
}
