<div class="grid w-full grid-cols-1 gap-2 justify-items-center">
    <div class="max-w-[100vw] overflow-auto sm:max-w-full scrollbar-none">
        <div class="flex flex-row max-w-full gap-2 px-4">
            <button class="btn normal-case {{ $active == 'showAll' ? '' : 'btn-outline' }}"
                wire:click="setOrderTabActive('showAll')">Semua Pesanan</button>
            <button class="btn normal-case {{ $active == 'pending' ? '' : 'btn-outline' }}"
                wire:click="setOrderTabActive('pending')">Belum Dibayar</button>
            <button class="btn normal-case {{ $active == 'confirm' ? '' : 'btn-outline' }}"
                wire:click="setOrderTabActive('confirm')">Menunggu Konfirmasi</button>
            <button class="btn normal-case {{ $active == 'processing' ? '' : 'btn-outline' }}"
                wire:click="setOrderTabActive('processing')">Sedang Diproses</button>
            <button class="btn normal-case {{ $active == 'delivery' ? '' : 'btn-outline' }}"
                wire:click="setOrderTabActive('delivery')">Sedang Dikirim</button>
        </div>
    </div>
    <div
        class="w-full p-4 my-2 border shadow sm:w-[46rem] flex flex-col gap-4 max-h-[68vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
        @if ($active == 'showAll')
            @if (count($orderTotal) > 0)
                @foreach ($orderTotal as $order)
                    <div class="relative p-2 border rounded-md shadow-sm sm:p4 bg-gray-50">
                        <div class="absolute font-medium right-2">
                            Rp{{ number_format($order->price_amount, 0, ',', '.') }}
                        </div>
                        <div class="text-lg font-semibold">Legalisir Dokumen</div>
                        <div class="text-xs text-gray-500">ID Transaksi: {{ $order->transaction_id }}</div>
                        <div class="flex flex-col sm:flex-row sm:gap-8">
                            @if ($order->ijazah_idn_qty || $order->transkrip_idn_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Indonesia</p>
                                    @if ($order->ijazah_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if ($order->ijazah_eng_qty || $order->transkrip_eng_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Inggris</p>
                                    @if ($order->ijazah_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        @php
                            $statusClass = '';
                            $statusLabel = '';
                            if ($order->status == 'Pending') {
                                $statusLabel = 'Belum Dibayar';
                            }
                            if ($order->status == 'Confirm') {
                                $statusClass = 'badge-outline';
                                $statusLabel = 'Menunggu Konfirmasi';
                            }
                            if ($order->status == 'Processing') {
                                $statusClass = 'text-white bg-blue-600 border-blue-600';
                                $statusLabel = 'Sedang Diproses';
                            }
                            if ($order->status == 'Delivery') {
                                $statusClass = 'text-white bg-indigo-700 border-indigo-700';
                                $statusLabel = 'Sedang Dikirim';
                            }
                            if ($order->status == 'Success') {
                                $statusClass = 'text-white bg-green-600 border-green-600';
                                $statusLabel = 'Pesanan Selesai';
                            }
                            if ($order->status == 'Failed') {
                                $statusClass = 'text-white bg-red-600 border-red-600';
                                $statusLabel = 'Pesanan Dibatalkan';
                            }
                        @endphp
                        <div class="flex flex-row items-start justify-between mt-4">
                            <div class="font-medium badge {{ $statusClass }}">{{ $statusLabel }}</div>
                            <div class="font-medium">{{ date('d-m-Y', strtotime($order->updated_at)) }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data yang dapat ditampilkan</p>
            @endif
        @endif
        @if ($active == 'pending')
            @if (count($orderPending) > 0)
                @foreach ($orderPending as $order)
                    <div class="relative p-2 border rounded-md shadow-sm sm:p4 bg-gray-50">
                        <div class="absolute font-medium right-2">
                            Rp{{ number_format($order->price_amount, 0, ',', '.') }}
                        </div>
                        <div class="text-lg font-semibold">Legalisir Dokumen</div>
                        <div class="text-xs text-gray-500">ID Transaksi: {{ $order->transaction_id }}</div>
                        <div class="flex flex-col sm:flex-row sm:gap-8">
                            @if ($order->ijazah_idn_qty || $order->transkrip_idn_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Indonesia</p>
                                    @if ($order->ijazah_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if ($order->ijazah_eng_qty || $order->transkrip_eng_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Inggris</p>
                                    @if ($order->ijazah_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        @php
                            $statusClass = '';
                            $statusLabel = '';
                            if ($order->status == 'Pending') {
                                $statusLabel = 'Belum Dibayar';
                            }
                        @endphp
                        <div class="flex flex-row items-start justify-between mt-4">
                            <div class="font-medium badge {{ $statusClass }}">{{ $statusLabel }}</div>
                            <div class="font-medium">{{ date('d-m-Y', strtotime($order->updated_at)) }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data yang dapat ditampilkan</p>
            @endif
        @endif
        @if ($active == 'confirm')
            @if (count($orderConfirm) > 0)
                @foreach ($orderConfirm as $order)
                    <div class="relative p-2 border rounded-md shadow-sm sm:p4 bg-gray-50">
                        <div class="absolute font-medium right-2">
                            Rp{{ number_format($order->price_amount, 0, ',', '.') }}
                        </div>
                        <div class="text-lg font-semibold">Legalisir Dokumen</div>
                        <div class="text-xs text-gray-500">ID Transaksi: {{ $order->transaction_id }}</div>
                        <div class="flex flex-col sm:flex-row sm:gap-8">
                            @if ($order->ijazah_idn_qty || $order->transkrip_idn_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Indonesia</p>
                                    @if ($order->ijazah_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if ($order->ijazah_eng_qty || $order->transkrip_eng_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Inggris</p>
                                    @if ($order->ijazah_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        @php
                            $statusClass = 'badge-outline';
                            $statusLabel = '';
                            if ($order->status == 'Confirm') {
                                $statusLabel = 'Menunggu Konfirmasi';
                            }
                        @endphp
                        <div class="flex flex-row items-start justify-between mt-4">
                            <div class="font-medium badge {{ $statusClass }}">{{ $statusLabel }}</div>
                            <div class="font-medium">{{ date('d-m-Y', strtotime($order->updated_at)) }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data yang dapat ditampilkan</p>
            @endif
        @endif
        @if ($active == 'processing')
            @if (count($orderProcess) > 0)
                @foreach ($orderProcess as $order)
                    <div class="relative p-2 border rounded-md shadow-sm sm:p4 bg-gray-50">
                        <div class="absolute font-medium right-2">
                            Rp{{ number_format($order->price_amount, 0, ',', '.') }}
                        </div>
                        <div class="text-lg font-semibold">Legalisir Dokumen</div>
                        <div class="text-xs text-gray-500">ID Transaksi: {{ $order->transaction_id }}</div>
                        <div class="flex flex-col sm:flex-row sm:gap-8">
                            @if ($order->ijazah_idn_qty || $order->transkrip_idn_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Indonesia</p>
                                    @if ($order->ijazah_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if ($order->ijazah_eng_qty || $order->transkrip_eng_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Inggris</p>
                                    @if ($order->ijazah_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        @php
                            $statusClass = '';
                            $statusLabel = '';
                            if ($order->status == 'Processing') {
                                $statusClass = 'text-white bg-blue-600 border-blue-600';
                                $statusLabel = 'Sedang Diproses';
                            }
                        @endphp
                        <div class="flex flex-row items-start justify-between mt-4">
                            <div class="font-medium badge {{ $statusClass }}">{{ $statusLabel }}</div>
                            <div class="font-medium">{{ date('d-m-Y', strtotime($order->updated_at)) }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data yang dapat ditampilkan</p>
            @endif
        @endif
        @if ($active == 'delivery')
            @if (count($orderDelivery) > 0)
                @foreach ($orderDelivery as $order)
                    <div class="relative p-2 border rounded-md shadow-sm sm:p4 bg-gray-50">
                        <div class="absolute font-medium right-2">
                            Rp{{ number_format($order->price_amount, 0, ',', '.') }}
                        </div>
                        <div class="text-lg font-semibold">Legalisir Dokumen</div>
                        <div class="text-xs text-gray-500">ID Transaksi: {{ $order->transaction_id }}</div>
                        <div class="flex flex-col sm:flex-row sm:gap-8">
                            @if ($order->ijazah_idn_qty || $order->transkrip_idn_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Indonesia</p>
                                    @if ($order->ijazah_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_idn_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_idn_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            @if ($order->ijazah_eng_qty || $order->transkrip_eng_qty)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700">Translasi Bahasa Inggris</p>
                                    @if ($order->ijazah_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Ijazah ({{ $order->ijazah_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                    @if ($order->transkrip_eng_qty)
                                        <div class="text-sm text-gray-600">
                                            <i class="scale-50 fas fa-circle"></i>
                                            <span>Transkrip Nilai ({{ $order->transkrip_eng_qty }} Lembar)</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>

                        @php
                            $statusClass = '';
                            $statusLabel = '';
                            if ($order->status == 'Confirm') {
                                $statusClass = 'text-white bg-blue-600 border-blue-600';
                                $statusLabel = 'Sedang Diproses';
                            }
                            if ($order->status == 'Delivery') {
                                $statusClass = 'text-white bg-indigo-700 border-indigo-700';
                                $statusLabel = 'Sedang Dikirim';
                            }
                        @endphp
                        <div class="flex flex-row items-start justify-between mt-4">
                            <div class="font-medium badge {{ $statusClass }}">{{ $statusLabel }}</div>
                            <div class="font-medium">{{ date('d-m-Y', strtotime($order->updated_at)) }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Belum ada data yang dapat ditampilkan</p>
            @endif
        @endif
    </div>
</div>
