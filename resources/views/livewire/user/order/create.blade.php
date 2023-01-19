<div class="grid w-full grid-cols-1 gap-2 justify-items-center">
    <div class="max-w-sm overflow-auto sm:max-w-full scrollbar-none">
        <div class="flex flex-row max-w-full gap-2">
            <button class="btn normal-case {{ $active == 'Data Pemesan' ? '' : 'btn-outline' }}"
                wire:click="setActive('Data Pemesan')">1. Data Pemesan</button>
            <button class="btn normal-case {{ $active == 'Data Dokumen' ? '' : 'btn-outline' }}"
                wire:click="setActive('Data Dokumen')">2. Data Dokumen</button>
            <button class="btn normal-case {{ $active == 'Konfirmasi' ? '' : 'btn-outline' }}"
                wire:click="setActive('Konfirmasi')">3. Konfirmasi Pemesanan</button>
        </div>
    </div>
    <div class="w-full p-4 my-2 border shadow sm:w-[32rem]">
        @if ($active == 'Data Pemesan')
            <div class="">
                <div class="py-4">
                    <x-utils.form.input label="Nama Pemesan" id="name" type="text" name="name"
                        :value="old('name')" required autofocus />
                    <x-partials.input-error :messages="$errors->get('name')" />
                </div>
                <div class="py-4">
                    <x-utils.form.input label="NIS" id="student_id" type="text" name="student_id"
                        :value="old('student_id')" required autofocus />
                    <x-partials.input-error :messages="$errors->get('student_id')" />
                </div>
                <div class="py-4">
                    <x-utils.form.input label="Alamat" id="address" type="text" name="address" :value="old('address')"
                        required autofocus />
                    <x-partials.input-error :messages="$errors->get('address')" />
                </div>
            </div>
        @endif
        @if ($active == 'Data Dokumen')
            <div class="">
                <div class="py-4">
                    <x-utils.form.input label="Ijazah" id="ijazah" type="checkbox" name="ijazah" :value="old('ijazah')"
                        required autofocus />
                    <x-partials.input-error :messages="$errors->get('ijazah')" />
                </div>
            </div>
        @endif
    </div>
</div>
