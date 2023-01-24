<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use App\Models\Order;
use App\Models\School;
use App\Models\Payment;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user, $school, $documentValidation, $orderConfirm, $studentCount, $orderTotal;

    public function __construct(){
        $this->user = Auth::user();
        $this->school = School::where('user_id', $this->user->id)->first();
        
        $this->documentValidation = Document::where('school_id', $this->school->id)
                ->where('status','Pending')
                ->count();
        $this->studentCount = Profile::where('school_id', $this->school->id)
                ->count();

        $this->orderTotal = Order::with('user')
                ->whereHas('user', function($user){
                    return $user->whereHas('profile', function($profile){
                        return $profile->where('school_id', $this->school->id);
                    });
                })
                ->count();

        $this->orderConfirm = Order::where('status','Confirm')
                ->with('user')
                ->whereHas('user', function($user){
                    return $user->whereHas('profile', function($profile){
                        return $profile->where('school_id', $this->school->id);
                    });
                })
                ->count();
    }
    public function render()
    {
        return view('livewire.admin.dashboard.index');
    }
}
