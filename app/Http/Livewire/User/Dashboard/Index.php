<?php

namespace App\Http\Livewire\User\Dashboard;

use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\User\Order\Index as OrderIndex;

class Index extends Component
{
    public $user, $paymentPending, $orderPending, $orderDelivery, $orderTotal;

    public function __construct(){
        $this->user = Auth::user();
        $this->paymentPending = Payment::where('user_id', $this->user->id)
                ->where('status','Pending')
                ->count();
        $this->orderPending = Order::where('user_id', $this->user->id)
                ->where('status','Pending')
                ->with('payment')
                ->whereHas('payment', function($q) {
                    return $q->where('user_id',$this->user->id)->where('status', 'Success');
                })
                ->count();
        $this->orderDelivery = Order::where('user_id', $this->user->id)
                ->where('status','Delivery')
                ->count();
        $this->orderTotal = Order::where('user_id', $this->user->id)->count();
    }
    public function render()
    {
        return view('livewire.user.dashboard.index');
    }
}
