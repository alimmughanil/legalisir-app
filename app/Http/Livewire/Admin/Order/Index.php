<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\User;
use App\Models\Order;
use App\Models\School;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $filter;
    public $user, $orders, $documents, $school, $i = 1;
    
    public function updatedFilter(){
        if ($this->filter == 'all') {
            return redirect('/order');
        }else {
            return redirect('/order?status='.$this->filter);
        }
    }

    public function __construct()
    {
        $this->user = Auth::user();
        $this->school = School::where('user_id', $this->user->id)->first();
        $orders = Order::with('user', 'document')
            ->whereHas('user.profile', function($q){
                $q->where('school_id', $this->school->id);
            });

        if (request()->status) {
            $this->orders = $orders->where('status', request()->status)->get();
        }
        $this->orders = $orders->get();
    }
    public function render()
    {
        return view('livewire.admin.order.index');
    }
}
