@section('title', 'Register')

<div>
    <a href="/" class="text-center">
        <img class="w-24 mx-auto" src="/image/logo.svg" alt="logo" />
        <h4 class="pb-1 mt-1 mb-6 text-xl font-semibold">Legalisir App</h4>
    </a>
    <!-- Session Status -->
    <x-partials.auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="register">
        <div class="grid grid-cols-1 gap-4">

            <div class="grid grid-cols-1 gap-8">
                <!-- Name -->
                <div>
                    <x-utils.form.input wire:model.lazy="name" label="Name" id="name" type="text"
                        name="name" :value="old('name')" required autofocus />
                    <x-partials.input-error :messages="$errors->get('name')" class="-mt-1" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-utils.form.input wire:model.lazy="email" label="Email" id="email" type="email"
                        name="email" :value="old('email')" required autofocus />
                    <x-partials.input-error :messages="$errors->get('email')" class="-mt-1" />
                </div>

                <!-- Password -->
                <div>
                    <x-utils.form.input wire:model.lazy="password" label="Password" id="password" type="password"
                        name="password" :value="old('password')" required autocomplete="new-password" />

                    <x-partials.input-error :messages="$errors->get('password')" class="-mt-1" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-utils.form.input wire:model.lazy="passwordConfirmation" label="Confirm Password"
                        id="password_confirmation" type="password" name="password_confirmation" :value="old('password')"
                        required autocomplete="new-password" />
                    <x-partials.input-error :messages="$errors->get('password_confirmation')" class="-mt-1" />
                </div>
            </div>

            <button type="submit" class="w-full normal-case btn-sm btn btn-primary">Register</button>
            <div class="text-center">
                <div class="divider">Sudah Punya Akun?</div>
                <a href="/login" class="underline link-primary">Login</a>
            </div>
        </div>
    </form>
</div>
