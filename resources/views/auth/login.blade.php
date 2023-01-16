<x-guest-layout>
    <a href="/" class="text-center">
        <img class="w-24 mx-auto" src="/image/logo.svg" alt="logo" />
        <h4 class="pb-1 mt-1 mb-6 text-xl font-semibold">Legalisir App</h4>
    </a>
    <!-- Session Status -->
    <x-partials.auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="grid grid-cols-1 gap-4">
            <div class="grid grid-cols-1 gap-8">
                <!-- Email Address -->
                <div>
                    <x-utils.form.input label="Email" id="email" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-partials.input-error :messages="$errors->get('email')" />
                </div>
                <!-- Password -->
                <div>
                    <div>
                        <x-utils.form.input label="Password" id="password" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-partials.input-error :messages="$errors->get('password')" />
                    </div>
                    <div class="block">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                        </label>
                    </div>
                    <div class="hidden">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                Lupa Password?
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full normal-case btn-sm btn btn-primary">Login</button>
            <div class="text-center">
                <div class="divider">Belum Punya Akun?</div>
                <a href="/register" class="underline link-primary">Register</a>
            </div>
        </div>
    </form>
</x-guest-layout>
