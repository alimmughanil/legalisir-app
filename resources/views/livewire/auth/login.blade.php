@section('title', 'Login')
<div>
    <!-- Session Status -->
    <x-partials.auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="authenticate">
        <div class="grid grid-cols-1 gap-4">
            {{ $this->form }}
            <div class="hidden">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>
            <button type="submit" class="w-full normal-case btn-sm btn btn-primary">Login</button>
            <div class="text-center">
                <div class="divider">Belum Punya Akun?</div>
                <a href="/register" class="underline link-primary">Register</a>
            </div>
        </div>
    </form>
</div>
