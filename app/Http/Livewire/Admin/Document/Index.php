<?php

namespace App\Http\Livewire\Admin\Document;

use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class Index extends Component
{
    public $user, $documents, $documentId, $i = 1;
    
    public function __construct()
    {
        $this->user = Auth::user();
        $documents = Document::where('school_id', $this->user->school->id)->with('user');
        
        if (request()->status) {
            $this->documents = $documents->where('status', request()->status)->get();
        }
        $this->documents = $documents->get();
    }
    protected function getListeners()
    {
        return ['submit' => 'submit'];
    }
    public function submit($type)
    {
        if ($type == 'confirm') {
            $document = Document::where('id',$this->documentId)->first();
            $document->update([
                'status' => 'Confirm'
            ]);

            $message = "Konfirmasi Pengajuan Dokumen";
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/document');
        }
        elseif ($type == 'reject') {
            $document = Document::where('id',$this->documentId)->first();
            $document->update([
                'status' => 'Reject'
            ]);

            $message = "Penolakan Pengajuan Dokumen";
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/document');
        }
        else {
            $message = "Aksi tidak diijinkan";
            Notification::make() 
                    ->title($message)
                    ->danger()
                    ->duration(5000)
                    ->send();
                return redirect('/document');
        }
        
    }
    public function showDocument($documentUrl)
    {
        $fileCheck = Storage::disk('public')->exists($documentUrl);
            if ($fileCheck) {
                return Storage::disk('public')->download($documentUrl);
            }else {
                Notification::make() 
                    ->title('Permintaan Gagal')
                    ->body('Tidak dapat mengunduh dokumen')
                    ->danger()
                    ->duration(5000)
                    ->send();
            }
    }

    public function render()
    {
        return view('livewire.admin.document.index');
    }
}
