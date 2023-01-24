<?php

namespace App\Http\Livewire\Admin\Profile;

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
    public $name, $email, $phone, 
        $school_phone,$school_address,$school_icon,$city,$province,
        $old_password, $password, $passwordConfirmation;

    // state properties
    public $isEdit;
    
    public function mount(): void {
        $this->user = Auth::user();
        $this->school = $this->user->school;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->school_phone = $this->school->school_phone;
        $this->school_address = $this->school->school_address;
        $this->city = $this->school->city;
        $this->province = $this->school->province;
    }

    protected function getPhotoFormSchema(): array
    {
        return [
            FileUpload::make('school_icon')
                ->label('Upload Logo Sekolah')
                ->image()
                ->extraAttributes(['class'=>"w-[70vw] border-box sm:w-[20rem]"])
                ->disk('public')
                ->directory('school-icon/'.$this->user->id)
                ->preserveFilenames()
                ->required(),
        ];
    }


    protected function getProfileFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Nama Akun')
                ->required(),
            TextInput::make('email')
                ->label('Email Akun')
                ->email()
                ->required(),
            TextInput::make('school_name')
                ->label('Nama Sekolah')
                ->required(),
            TextInput::make('school_phone')
                ->label('Telepon Sekolah')
                ->tel()
                ->telRegex('/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/')
                ->required(),
            TextInput::make('school_address')
                ->label('Alamat Sekolah')
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

        if ($this->school->school_icon) { 
            $fileCheck = Storage::disk('public')->exists(substr($this->school->school_icon,9));
            if ($fileCheck == true && substr($this->school->school_icon,9) != $validatedData['school_icon']) {
                Storage::disk('public')->delete(substr($this->school->school_icon,9));
            }
        }
        $update = $this->school->update([
            'school_icon' => '/storage/' . $validatedData['school_icon']
        ]);        

        $message = "Update Logo Sekolah";
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
            'title' => "Profil Sekolah"
        ];
        return view('livewire.admin.profile.index', compact('data'));
    }
}