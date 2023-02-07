<?php

namespace App\Http\Livewire\User\Payment;

use Livewire\Component;

class Show extends Component
{
    public $payment;
    public function updatePayment(){
        $this->payment->order->update([
            'status' => 'Confirm'
        ]);
        $this->payment->update([
            'status' => 'Paid'
        ]);
        return redirect('/order?active=confirm');
    }
    public function render()
    {
        return view('livewire.user.payment.show');
    }
}