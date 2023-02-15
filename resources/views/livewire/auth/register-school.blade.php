@section('title', 'Register Mitra Sekolah')

<div>
    <x-partials.auth-session-status class="mb-4" :status="session('status')" />
    <form wire:submit.prevent="register">
        <div class="grid grid-cols-1 gap-4">
            {{ $this->schoolForm }}
            <label class="text-sm font-medium">Alamat Sekolah</label>
            @error('address')
                <p class="text-sm text-danger-500">* {{ $message }}</p>
            @enderror
            @error('postcode')
                <p class="text-sm text-danger-500">* {{ $message }}</p>
            @enderror
            <div class="border border-gray-200 p-4 rounded-lg flex flex-col gap-1 w-full">
                <label class="text-sm">Provinsi</label>
                <select class="select select-bordered mb-2 w-full" wire:loading.attr='disabled'
                    wire:model="province_origin" name="province_origin" id="">
                    <option value="" selected>Pilih Salah Satu Provinsi</option>
                    @foreach ($provinceList as $value)
                        <option value="{{ json_encode($value) }}">{{ $value['province'] }}</option>
                    @endforeach
                </select>
                @if ($cityByProvince)
                    <label class="text-sm">Kabupaten atau Kota</label>
                    <select class="select select-bordered mb-2 w-full" wire:loading.attr='disabled'
                        wire:model="city_origin" name="city_origin" id="">
                        <option value="" selected>Pilih Salah Satu Kota atau Kabupaten</option>
                        @foreach ($cityByProvince as $city)
                            <option value="{{ json_encode($city) }}">{{ $city['type'] }}
                                {{ $city['city_name'] }}
                            </option>
                        @endforeach
                    </select>
                    @if ($city_origin)
                        <label class="text-sm">Kode Pos</label>
                        <input type="text" class="input input-bordered w-full mb-2" value="{{ $postcode }}"
                            wire:model="postcode">
                        <label class="text-sm">Alamat Sekolah</label>
                        <input type="text" class="input input-bordered w-full mb-2" value="{{ $address }}"
                            wire:model="address">
                    @endif
                @endif
            </div>
            {{ $this->loginForm }}
            <button type="submit" class="w-full normal-case btn-sm btn btn-primary">Register</button>
            <div class="text-center">
                <div class="divider">Sudah Punya Akun?</div>
                <a href="/login" class="underline link-primary">Login</a>
            </div>
        </div>
    </form>
</div>
