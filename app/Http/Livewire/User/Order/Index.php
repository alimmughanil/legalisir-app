<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $active = "showAll";
    public $user, $orderPending, $orderConfirm, $orderDelivery, $orderTotal;

    public function __construct(){
        $request = new Request;
        if (request()->active) {
            $this->setOrderTabActive(request()->active);
        }
        $this->user = Auth::user();
        $this->orderPending = Order::where('user_id', $this->user->id)
                ->where('status','Pending')
                ->with('payment')
                ->get();
        $this->orderConfirm = Order::where('user_id', $this->user->id)
                ->where('status','Confirm')
                ->get();
        $this->orderDelivery = Order::where('user_id', $this->user->id)
                ->where('status','Delivery')
                ->get();
        $this->orderTotal = Order::where('user_id', $this->user->id)->get();
    }

    public function setOrderTabActive($state){
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
