<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required'],
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
            'photo' => $photo
        ]);

        event(new Registered($user));
        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
