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
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class Create extends Component implements HasForms
{
    use InteractsWithForms;

    public string $name;
    public int $school_id;
    public string $student_id;
    public int $user_id;
    public $ijazah;
    public $transkrip;
    public $statement_letter;
    public $graduated_at = '';
    
    protected function getFormSchema(): array
    {
        $user_id = Auth::user()->id;
        $ijazahFileName = $user_id.'-ijazah-'. Str::random(16);
        $transkripFileName = $user_id.'-transkrip-'. Str::random(16);

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
                ->disabled(),
            TextInput::make('student_id')
                ->label('Nomor Induk Siswa (NIS)')
                ->dehydrated(false)
                ->disabled(),
            TextInput::make('graduated_at')
                ->label('Tahun Lulus')
                ->required()
                ->numeric()
                ->beforeOrEqual(now()->format('Y'))
                ->dehydrated(false),
            FileUpload::make('ijazah')
                ->label('Upload Ijazah')
                ->acceptedFileTypes(['application/pdf','image/png','image/jpg','image/jpeg'])
                ->helperText('<p class="text-xs">Format file: pdf, png, jpg, dan jpeg<p/>')
                ->disk('public')
                ->directory('ijazah/'.$user_id)
                ->preserveFilenames()
                ->required(),
            FileUpload::make('transkrip')
                ->label('Upload Transkrip')
                ->acceptedFileTypes(['application/pdf','image/png','image/jpg','image/jpeg'])
                ->helperText('<p class="text-xs">Format file: pdf, png, jpg, dan jpeg<p/>')
                ->disk('public')
                ->directory('transkrip/'.$user_id)
                ->preserveFilenames()
                ->required(),
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
        $this->form->fill([
            'user_id' => $user->id,
            'name' => $user->name,
            'school_id' => $user->profile->school_id,
            'student_id' => $user->profile->student_id,
            'graduated_at' => $user->profile->graduated_at ? $user->profile->graduated_at : "",
        ]);
    }
    public function store(){
        $validatedData = $this->form->getState();
        $validatedData['user_id'] = $this->user_id;

        $store = Document::create($validatedData);  
        $profile = Profile::where('user_id', $this->user_id)->first();      
        $store = $profile->update([
            'graduated_at' => $this->graduated_at
        ]);        

        $message = "Tambah Data Dokumen";
        if ($store) {
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
        return view('livewire.user.document.create');
    }
}
