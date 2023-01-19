<div class="grid w-full grid-cols-1 gap-2 justify-items-center">
    <div class="max-w-[100vw] overflow-auto sm:max-w-full scrollbar-none">
        <div class="flex flex-row max-w-full gap-2 px-4">
            <button class="btn normal-case {{ $active == 'Menunggu Pembayaran' ? '' : 'btn-outline' }}"
                wire:click="setActive('Menunggu Pembayaran')">Menunggu Pembayaran</button>
            <button class="btn normal-case {{ $active == 'Menunggu Konfirmasi' ? '' : 'btn-outline' }}"
                wire:click="setActive('Menunggu Konfirmasi')">Menunggu Konfirmasi</button>
            <button class="btn normal-case {{ $active == 'Menunggu Pengiriman' ? '' : 'btn-outline' }}"
                wire:click="setActive('Menunggu Pengiriman')">Menunggu Pengiriman</button>
            <button class="btn normal-case {{ $active == 'Semua Pesanan' ? '' : 'btn-outline' }}"
                wire:click="setActive('Semua Pesanan')">Semua Pesanan</button>
        </div>
    </div>
    <div
        class="w-full p-4 my-2 border shadow sm:w-[46rem] flex flex-col gap-4 max-h-[68vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
        @if ($active == 'Semua Pesanan')
            @for ($i = 0; $i < 10; $i++)
                <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                    <div class="absolute font-medium right-2">Rp100.000</div>
                    <div class="text-lg font-semibold">Legalisir Dokumen</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Ijazah (1 Lembar)</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Transkrip Nilai (10 Lembar)</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        <div class="font-medium text-white bg-green-600 border-green-600 badge">Pesanan Diterima</div>
                        <div class="font-medium">19 Jan 2023</div>
                    </div>
                </div>
            @endfor
        @endif
        @if ($active == 'Menunggu Pembayaran')
            @for ($i = 0; $i < 10; $i++)
                <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                    <div class="absolute font-medium right-2">Rp100.000</div>
                    <div class="text-lg font-semibold">Legalisir Dokumen</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Ijazah (1 Lembar)</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Transkrip Nilai (10 Lembar)</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        <div class="font-medium badge">Belum Dibayar</div>
                        <div class="font-medium">19 Jan 2023</div>
                    </div>
                </div>
            @endfor
        @endif
        @if ($active == 'Menunggu Konfirmasi')
            @for ($i = 0; $i < 10; $i++)
                <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                    <div class="absolute font-medium right-2">Rp100.000</div>
                    <div class="text-lg font-semibold">Legalisir Dokumen</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Ijazah (1 Lembar)</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Transkrip Nilai (10 Lembar)</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        <div class="font-medium text-white bg-blue-600 border-blue-600 badge">Sedang Diproses</div>
                        <div class="font-medium">19 Jan 2023</div>
                    </div>
                </div>
            @endfor
        @endif
        @if ($active == 'Menunggu Pengiriman')
            @for ($i = 0; $i < 10; $i++)
                <div class="relative p-2 border rounded-md shadow-sm bg-gray-50">
                    <div class="absolute font-medium right-2">Rp100.000</div>
                    <div class="text-lg font-semibold">Legalisir Dokumen</div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Ijazah (1 Lembar)</span>
                    </div>
                    <div class="text-sm text-gray-600">
                        <i class="scale-50 fas fa-circle"></i>
                        <span>Transkrip Nilai (10 Lembar)</span>
                    </div>
                    <div class="flex flex-row items-start justify-between mt-4">
                        <div class="font-medium text-white bg-indigo-700 border-indigo-700 badge">Sedang Dikirim</div>
                        <div class="font-medium">19 Jan 2023</div>
                    </div>
                </div>
            @endfor
        @endif
    </div>
</div>
