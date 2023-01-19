<?php

namespace App\Http\Livewire\User\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $userAuth;
    public function __construct(){
        $this->userAuth = Auth::user();
    }
    public function render()
    {
        if ($this->userAuth->role == 'User') {
            return view('livewire.user.dashboard.index');
        }
    }
}
