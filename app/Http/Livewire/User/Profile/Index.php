<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\User;
use App\Models\School;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class Index extends Component implements HasForms
{   
    use InteractsWithForms;    

    // data properties
    public $user, $profile, $school; 
    
    // form properties
    public $photo, $name, $email, $phone, 
        $school_id, $student_id, $graduated_at,
        $old_password, $password, $passwordConfirmation;

    // state properties
    public $isEdit;
    public $photoData;
    
    public function mount(): void {
        $this->user = Auth::user();
        $this->profile = $this->user->profile;
        $this->school = School::where('id',$this->profile->school_id)->first();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->profile->phone;
        $this->school_id = $this->profile->school_id;
        $this->student_id = $this->profile->student_id;
        $this->graduated_at = $this->profile->graduated_at;
    }

    protected function getPhotoFormSchema(): array
    {
        return [
            FileUpload::make('photo')
                ->label('Upload Foto Profil')
                ->image()
                ->extraAttributes(['class'=>"w-[70vw] border-box sm:w-[20rem]"])
                ->disk('public')
                ->directory('photo/'.$this->user->id)
                ->preserveFilenames()
                ->required(),
        ];
    }


    protected function getProfileFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Nama Lengkap')
                ->required(),
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            TextInput::make('phone')
                ->label('Nomor Handphone')
                ->tel()
                ->telRegex('/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/')
                ->required(),
            Select::make('school_id')
                ->label('Sekolah')
                ->options(School::all()->pluck('school_name', 'id'))
                ->searchable()
                ->required(),
            TextInput::make('student_id')
                ->label('Nomor Induk Siswa (NIS)')
                ->required(),
            TextInput::make('graduated_at')
                ->label('Lulus Tahun')
                ->numeric()
                ->beforeOrEqual(now()->format('Y'))
                ->required(),
        ];
    }

    protected function getPasswordFormSchema(): array
    {
        return [
            TextInput::make('old_password')
                ->label('Password Lama')
                ->password()
                ->required(),
            TextInput::make('password')
                ->label('Password Baru')
                ->password()
                ->same('passwordConfirmation')
                ->required(),
            TextInput::make('passwordConfirmation')
                ->label('Ulangi Password Baru')
                ->password()
                ->reactive()
                ->required(),
        ];
    }

    protected function getForms(): array 
    {
        return [
            'photoForm' => $this->makeForm()
                ->schema($this->getPhotoFormSchema()),
            'profileForm' => $this->makeForm()
                ->schema($this->getProfileFormSchema()),
            'passwordForm' => $this->makeForm()
                ->schema($this->getPasswordFormSchema()),
        ];
    }


    public function updatePhoto()
    {
        $validatedData = $this->photoForm->getState();

        $profile = Profile::where('user_id', $this->user->id)->first();
        if ($profile->photo) { 
            $fileCheck = Storage::disk('public')->exists(substr($profile->photo,9));
            if ($fileCheck == true && substr($profile->photo,9) != $validatedData['photo']) {
                Storage::disk('public')->delete(substr($profile->photo,9));
            }
        }
        $update = $profile->update([
            'photo' => '/storage/' . $validatedData['photo']
        ]);        

        $message = "Update Foto Profil";
        if ($update) {
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/profile');
        }else {
            Notification::make() 
                ->title($message. ' Gagal')
                ->body('Terdapat gangguan pada sistem')
                ->danger()
                ->duration(5000)
                ->send();
        }
    }
    public function updateProfile()
    {
        $validatedData = $this->profileForm->getState();

        $user = User::where('id', $this->user->id)->first();
        $update = $user->update([
            'name' =>  $validatedData['name'],
            'email' =>  $validatedData['email'],
        ]);        
        $update = $user->profile->update([
            'phone' =>  $validatedData['phone'],
            'school_id' =>  $validatedData['school_id'],
            'student_id' =>  $validatedData['student_id'],
            'graduated_at' =>  $validatedData['graduated_at'],
        ]);        

        $message = "Update Profil";
        if ($update) {
            Notification::make() 
                    ->title($message. ' Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/profile');
        }else {
            Notification::make() 
                ->title($message. ' Gagal')
                ->body('Terdapat gangguan pada sistem')
                ->danger()
                ->duration(5000)
                ->send();
        }
    }

    public function updatePassword()
    {
        $validatedData = $this->passwordForm->getState();
        $user = User::where('id', $this->user->id)->first();
        
        $validationOldPassword = Hash::check($validatedData['old_password'], $user->password);
        if ($validationOldPassword) {
            $update = $user->update([
                'password' => Hash::make($validatedData['password']),
            ]);        

            if ($update) {
                Notification::make() 
                    ->title('Update Password Berhasil')
                    ->success()
                    ->duration(5000)
                    ->send();
                return redirect('/profile');
            }else {
                Notification::make() 
                    ->title('Update Password Gagal')
                    ->body('Terdapat gangguan pada sistem')
                    ->danger()
                    ->duration(5000)
                    ->send();
                }
        } else {
            Notification::make() 
            ->title('Update Password Gagal')
            ->body('Password lama tidak sesuai dengan catatan kami')
            ->danger()
            ->duration(5000)
            ->send();
        }
    }

    public function render()
    {
        $data = [
            'title' => "Profil Saya"
        ];
        return view('livewire.user.profile.index', compact('data'));
    }
}
