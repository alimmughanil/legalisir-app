@section('title', 'Register Alumni')

<div>
    <x-partials.auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="register">
        <div class="grid grid-cols-1 gap-4">
            {{ $this->form }}
            <button type="submit" class="w-full normal-case btn-sm btn btn-primary">Register</button>
            <div class="text-center">
                <div class="divider">Sudah Punya Akun?</div>
                <a href="/login" class="underline link-primary">Login</a>
            </div>
        </div>
    </form>
</div>
