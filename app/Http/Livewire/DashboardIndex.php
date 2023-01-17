<?php

namespace App\Http\Livewire;

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
        if ($this->userAuth->role == 'User') {
            return view('livewire.user.dashboard.index', compact('data'));
        }
    }
}
