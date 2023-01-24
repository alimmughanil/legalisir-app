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
                Notification::make() 
                    ->title('Permintaan Gagal')
                    ->body('Tidak dapat mengunduh dokumen')
                    ->danger()
                    ->duration(5000)
                    ->send();
            }
        } elseif ($type == 'transkrip') {
            $fileCheck = Storage::disk('public')->exists($this->transkrip);
            if ($fileCheck) {
                return Storage::disk('public')->download($this->transkrip);
            }else {
                Notification::make() 
                    ->title('Permintaan Gagal')
                    ->body('Tidak dapat mengunduh dokumen')
                    ->danger()
                    ->duration(5000)
                    ->send();
            }
        } else {
            Notification::make() 
                    ->title('Permintaan Gagal')
                    ->body('Tidak ada file yang dipilih')
                    ->danger()
                    ->duration(5000)
                    ->send();
        }
    }
    public function setActive($state){
        return $this->active = $state;
    }

    public function render()
    {
        $data = [
            'title' => "Data Dokumen"
        ];

        return view('livewire.user.document.index', compact('data'));
    }
}
