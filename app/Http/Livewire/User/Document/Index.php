<?php

namespace App\Http\Livewire\User\Document;

use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $active = "Ijazah";
    public $document;
    public $ijazah;
    public $transkrip;

    public function mount(): void 
    {
        $this->ijazah = $this->document->ijazah;
        $this->transkrip = $this->document->transkrip;
    }

    public function download($type){
        if ($type == 'ijazah') {
            $fileCheck = Storage::disk('public')->exists($this->ijazah);
            if ($fileCheck) {
                return Storage::disk('public')->download($this->ijazah);
            }else {
                return redirect('/document')->with('message','Tidak dapat mengunduh dokumen');
            }
        } elseif ($type == 'transkrip') {
            $fileCheck = Storage::disk('public')->exists($this->transkrip);
            if ($fileCheck) {
                return Storage::disk('public')->download($this->transkrip);
            }else {
                return redirect('/document')->with('message','Tidak dapat mengunduh dokumen');
            }
        } else {
            return redirect('/document')->with('message','Tidak ada file yang dipilih');
        }
    }
    public function setActive($state){
        return $this->active = $state;
    }

    public function render()
    {
        $data = [
            'title' => "Data Legalisir Ijazah"
        ];

        return view('livewire.user.document.index', compact('data'));
    }
}
