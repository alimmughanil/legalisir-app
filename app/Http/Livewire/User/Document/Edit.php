<?php

namespace App\Http\Livewire\User\Document;

use App\Models\School;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use App\Http\Controllers\DocumentController;
use Filament\Forms\Concerns\InteractsWithForms;

class Edit extends Component implements HasForms
{   
    use InteractsWithForms;

    public string $name;
    public int $school_id;
    public string $student_id;
    public string $graduated_at;
    public int $user_id;
    public $old_ijazah;
    public $old_transkrip;
    public $old_statement_letter;

    public $statement_letter;
    public $ijazah;
    public $transkrip;
    public $editDocument;
    public $document;
    
    protected function getFormSchema(): array
    {
        $user_id = Auth::user()->id;
        
        return [
            TextInput::make('user_id')
                ->label('User Id')
                ->hidden(),
            TextInput::make('name')
                ->label('Nama Lengkap')
                ->dehydrated(false)
                ->disabled(),
            Select::make('school_id')
                ->label('Nama Sekolah')
                ->options(School::all()->pluck('school_name', 'id'))
                ->dehydrated(false)
                ->disabled(),
            TextInput::make('student_id')
                ->label('Nomor Induk Siswa (NIS)')
                ->dehydrated(false)
                ->disabled(),
            TextInput::make('graduated_at')
                ->label('Tahun Lulus')
                ->required()
                ->beforeOrEqual(now()->format('Y'))
                ->dehydrated(false),
            FileUpload::make('ijazah')
                ->label('Upload Ijazah')
                ->acceptedFileTypes(['application/pdf','image/png','image/jpg','image/jpeg'])
                ->helperText('Format file: pdf, png, jpg, dan jpeg ')
                ->disk('public')
                ->directory('ijazah/'.$user_id)
                ->preserveFilenames(),
            FileUpload::make('transkrip')
                ->label('Upload Transkrip')
                ->acceptedFileTypes(['application/pdf','image/png','image/jpg','image/jpeg'])
                ->helperText('Format file: pdf, png, jpg, dan jpeg ')
                ->disk('public')
                ->directory('transkrip/'.$user_id)
                ->preserveFilenames(),
            FileUpload::make('statement_letter')
                ->label('Upload Surat Pernyataan Kepemilikan')
                ->acceptedFileTypes(['application/pdf','image/png','image/jpg','image/jpeg'])
                ->helperText('<p class="text-xs">Format file: pdf, png, jpg, dan jpeg<p/><br/>')
                ->disk('public')
                ->directory('statement_letter/'.$user_id)
                ->preserveFilenames()
                ->required(),
        ];
    }

    public function mount(): void 
    {
        $user = Auth::user();
        $this->document = Document::where('user_id', $user->id)->first();
        $this->form->fill([
            'user_id' => $user->id,
            'name' => $user->name,
            'school_id' => $user->profile->school_id,
            'student_id' => $user->profile->student_id,
            'graduated_at' => $user->profile->graduated_at,
            'old_ijazah' => $this->document->ijazah,
            'old_transkrip' => $this->document->transkrip,
            'old_statement_letter' => $this->document->statement_letter,
        ]);
    }

    public function setEditDocument($type){
        return $this->editDocument = $type;
    }

    public function download($type){
        if ($type == 'ijazah') {
            $fileCheck = Storage::disk('public')->exists($this->old_ijazah);
            if ($fileCheck) {
                return Storage::disk('public')->download($this->old_ijazah);
            }else {
                Notification::make() 
                    ->title('Permintaan Gagal')
                    ->body('Tidak dapat mengunduh dokumen')
                    ->danger()
                    ->duration(5000)
                    ->send();
            }
        } elseif ($type == 'transkrip') {
            $fileCheck = Storage::disk('public')->exists($this->old_transkrip);
            if ($fileCheck) {
                return Storage::disk('public')->download($this->old_transkrip);
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

    public function update($id){
        $data = [
            'ijazah' => $this->old_ijazah,
            'transkrip' => $this->old_transkrip,
            'statement_letter' => $this->old_statement_letter,
            'status' => "Pending"
        ];
        $newData = $this->form->getState();

        if ($newData['ijazah']) {
            $data['ijazah'] = $newData['ijazah'];
            Storage::disk('public')->delete($this->old_ijazah);
        }
        if ($newData['transkrip']) {
            $data['transkrip'] = $newData['transkrip'];
            Storage::disk('public')->delete($this->old_transkrip);
        }
        if ($newData['statement_letter']) {
            $data['statement_letter'] = $newData['statement_letter'];
            Storage::disk('public')->delete($this->old_statement_letter);
        }

        $document = Document::where('id',$id)->first();
        $profile = Profile::where('user_id',$document->user_id)->first();

        $update = $document->update($data);
        $update = $profile->update([
            'graduated_at' => $this->graduated_at
        ]);

        $message = "Edit Data Dokumen ";
        if ($update) {
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/document');
        }else {
            Notification::make() 
                ->title($message. ' Gagal')
                ->body('Terdapat gangguan pada sistem')
                ->danger()
                ->duration(5000)
                ->send();
        }
    }

    public function render()
    {
        $data = [
            'title' => "Edit Data Dokumen"
        ];
        return view('livewire.user.document.edit');
    }
}