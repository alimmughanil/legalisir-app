<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;

class Login extends Component implements HasForms
{
    use InteractsWithForms;

    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];
    
    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(),   
            Checkbox::make('remember')
                ->label('Ingat Saya')
                ->inline()
        ];
    }

    public function authenticate()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        return redirect()->intended('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
