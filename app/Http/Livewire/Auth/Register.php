<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\School;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class Register extends Component implements HasForms
{
    use InteractsWithForms;
    public string $name;
    public int $school_id;
    public string $student_id;
    public string $email;
    public string $password;   
    public string $passwordConfirmation; 

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Nama Lengkap')
                ->required(),
            Select::make('school_id')
                ->label('Sekolah')
                ->options(School::all()->pluck('school_name', 'id'))
                ->searchable()
                ->required(),
            TextInput::make('student_id')
                ->label('Nomor Induk Siswa (NIS)')
                ->required(),
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(),
            TextInput::make('passwordConfirmation')
                ->label('Ulangi Password')
                ->password()
                ->required(),
        ];
    }

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'school_id' => ['required'],
            'student_id' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'remember_token'=> Str::random(16),
        ]);

        $avatar = new Avatar;
        $photo = $avatar->create($this->name)
                ->setBackground('#474E68')
                ->setTheme('colorful')
                ->toBase64();

        $profile = Profile::create([
            'user_id' => $user->id,
            'photo' => $photo,
            'school_id' => $this->school_id,
            'student_id' => $this->student_id
        ]);

        event(new Registered($user));
        Auth::login($user, true);

        return redirect()->intended('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
