<div class="grid w-full grid-cols-1 gap-2 justify-items-center">
    <div class="max-w-[100vw] overflow-auto sm:max-w-full scrollbar-none">
        <div class="flex flex-row max-w-full gap-2 px-4">
            <button class="btn normal-case {{ $active == 'Ijazah' ? '' : 'btn-outline' }}"
                wire:click="setActive('Ijazah')">Ijazah</button>
            <button class="btn normal-case {{ $active == 'Transkrip Nilai' ? '' : 'btn-outline' }}"
                wire:click="setActive('Transkrip Nilai')">Transkrip Nilai</button>
        </div>
    </div>
    <div class="w-full p-4 my-2 border shadow sm:w-[46rem] flex flex-col gap-4 max-h-[68vh] overflow-auto">
        @if ($active == 'Ijazah')
            <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                @if (isset($document))
                    <div class="absolute right-4">
                        <i class="text-2xl fas fa-download"></i>
                    </div>
                    <div class="text-lg font-semibold">Data Ijazah</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>{{ $document->user->name }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>{{ $document->user->profile->student_id }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>{{ $document->user->name }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>Lulus pada tahun 2022</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        <div class="font-medium text-white bg-green-600 border-green-600 badge">Valid
                        </div>
                        <div class="font-medium">19 Jan 2023</div>
                    </div>
                    {{-- <img src="{{ $document->ijazah }}" width="400px" class="mx-auto border shadow-lg"
                        alt=""> --}}
                @else
                    <p>Belum ada data yang ditambahkan</p>
                @endif
            </div>
        @endif
        @if ($active == 'Transkrip Nilai')
            <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                @if (isset($document))
                    <div class="absolute right-4">
                        <i class="text-2xl fas fa-download"></i>
                    </div>
                    <div class="text-lg font-semibold">Data Transkrip</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>Alim Mughanil Karim</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>1908096035</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>SMKN 1 Adiwerna</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle">
                        </i>
                        <span>Lulus pada tahun 2022</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        <div class="font-medium text-white badge">Menunggu Validasi
                        </div>
                        <div class="font-medium">19 Jan 2023</div>
                    </div>
                    {{-- <img src="{{ $document->transkrip }}" width="400px" class="mx-auto border shadow-lg"
                        alt=""> --}}
                @else
                    <p>Belum ada data yang ditambahkan</p>
                @endif
            </div>
        @endif
    </div>
</div>
