<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\User;
use App\Models\School;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user, $graduatedUsers, $school, $i = 1;
    
    public function __construct()
    {
        $this->user = Auth::user();
        $this->school = School::select('id')->where('user_id', $this->user->id)->first();
        $this->graduatedUsers = User::where('role', 'User')
            ->whereHas('profile', function($q){
                $q->where('school_id', $this->school->id);
            })
            ->get();
    }
    public function render()
    {
        return view('livewire.admin.account.index');
    }
}
