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
        @if (Session::has('message'))
            <p class="p-4 text-sm text-gray-100 bg-red-600 rounded-md shadow-sm">
                {{ Session::get('message') }}</p>
        @endif
        @if ($active == 'Ijazah')
            <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                @if (isset($document))
                    <div class="absolute right-4">
                        <button wire:click="download('ijazah')" wire:loading.attr="disabled"
                            wire:loading.class="text-gray-400" class="flex flex-col items-center">
                            <i class="text-2xl fas fa-download"></i>
                            <span class="text-sm">Download</span>
                        </button>
                    </div>
                    <div class="text-lg font-semibold">Data Ijazah</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>{{ $document->user->name }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>{{ $document->user->profile->student_id }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>{{ $document->user->profile->school->school_name }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Lulus pada tahun {{ $document->user->profile->graduated_at }}</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        @php
                            $statusClass = '';
                            if ($document->status == 'Confirm') {
                                $statusClass = 'text-white bg-green-600 border-green-600';
                            }
                            if ($document->status == 'Reject') {
                                $statusClass = 'text-white bg-red-600 border-red-600';
                            }
                        @endphp
                        <div class="font-medium badge {{ $statusClass }}">{{ $document->status }}</div>
                        <div class="font-medium">{{ date('d-m-Y', strtotime($document->updated_at)) }}</div>
                    </div>
                @else
                    <p>Belum ada data yang ditambahkan</p>
                @endif
            </div>
        @endif
        @if ($active == 'Transkrip Nilai')
            <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                @if (isset($document))
                    <div class="absolute right-4">
                        <button wire:click="download('transkrip')" wire:loading.attr="disabled"
                            wire:loading.class="text-gray-400" class="flex flex-col items-center">
                            <i class="text-2xl fas fa-download"></i>
                            <span class="text-sm">Download</span>
                        </button>
                    </div>
                    <div class="text-lg font-semibold">Data Transkrip Nilai</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>{{ $document->user->name }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>{{ $document->user->profile->student_id }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>{{ $document->user->profile->school->school_name }}</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Lulus pada tahun {{ $document->user->profile->graduated_at }}</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        @php
                            $statusClass = '';
                            if ($document->status == 'Confirm') {
                                $statusClass = 'text-white bg-green-600 border-green-600';
                            }
                            if ($document->status == 'Reject') {
                                $statusClass = 'text-white bg-red-600 border-red-600';
                            }
                        @endphp
                        <div class="font-medium badge {{ $statusClass }}">{{ $document->status }}</div>
                        <div class="font-medium">{{ date('d-m-Y', strtotime($document->updated_at)) }}</div>
                    </div>
                @else
                    <p>Belum ada data yang ditambahkan</p>
                @endif
            </div>
        @endif
    </div>
</div>
