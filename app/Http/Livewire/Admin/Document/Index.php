<?php

namespace App\Http\Livewire\Admin\Document;

use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user, $documents, $i = 1;
    
    public function __construct()
    {
        $this->user = Auth::user();
        $this->documents = Document::where('school_id', $this->user->school->id)->with('user')->get();
        
    }

    public function render()
    {
        return view('livewire.admin.document.index');
    }
}
