<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashboardIndex extends Component
{
    public $userAuth;
    public function __construct(){
        $this->userAuth = Auth::user();
    }
    public function render()
    {
        $data = [
            'title' => "Dashboard"
        ];

        if ($this->userAuth->role == 0) {
            return view('livewire.user.dashboard-index', compact('data'));
        }
    }
}
