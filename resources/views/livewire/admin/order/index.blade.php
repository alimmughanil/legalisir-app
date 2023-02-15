<div>
    <div
        class="max-h-full md:max-h-[70vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
        <select wire:loading.attr='disabled' wire:model="filter" class="select select-bordered my-2">
            <option value="" selected>Filter Status</option>
            <option value="all">Tampilkan Semua</option>
            <option value="pending">Pending</option>
            <option value="confirm">Confirm</option>
            <option value="delivery">Delivery</option>
            <option value="success">Success</option>
            <option value="failded">Failded</option>
        </select>
        <div
            class="overflow-scroll max-h-screen max-w-[80vh] sm:max-w-[63vh] lg:max-w-[185vh] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            <table class="table w-full table-compact normal">
                <thead class="text-center">
                    <tr>
                        <th></th>
                        <th class="normal-case">No. Transaksi</th>
                        <th class="normal-case">Nama</th>
                        <th class="normal-case">Data Dokumen</th>
                        <th class="normal-case">Jumlah Pesanan</th>
                        <th class="normal-case">Tanggal</th>
                        <th class="normal-case">Status</th>
                        <th class="normal-case">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$orders->isEmpty())
                        @foreach ($orders as $order)
                            <tr class="text-center">
                                <th>{{ $i++ }}</th>
                                <td>{{ $order->transaction_id }}</td>
                                <td class="">
                                    <p class="font-semibold whitespace-normal text-center">{{ $order->user->name }}
                                    </p>
                                    <p class="text-center">{{ $order->user->profile->phone }}</p>
                                </td>
                                <td>
                                    <div class="flex flex-col">
                                        <button type="button"
                                            class="btn btn-xs text-sm btn-ghost normal-case font-medium"
                                            wire:click="download('$order->document->ijazah')"
                                            wire:loading.attr='disabled'>
                                            <span>Ijazah</span>
                                            <i class="fas fa-download ml-1"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-xs text-sm btn-ghost normal-case font-medium"
                                            wire:click="download('$order->document->transkrip')"
                                            wire:loading.attr='disabled'>
                                            <span>Transkrip Nilai</span>
                                            <i class="fas fa-download ml-1"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="my-2 text-left">
                                    @if ($order->ijazah_idn_qty > 0 || $order->transkrip_idn_qty > 0)
                                        <p class="font-semibold">Bahasa Indonesia</p>
                                    @endif
                                    <div class="{{ $order->ijazah_idn_qty > 0 ? 'grid grid-cols-2 ' : 'hidden' }}">
                                        <p>Ijazah</p>
                                        <p>: {{ $order->ijazah_idn_qty }} Lembar</p>
                                    </div>
                                    <div class="{{ $order->transkrip_idn_qty > 0 ? 'grid grid-cols-2 ' : 'hidden' }}">
                                        <p>Transkrip Nilai</p>
                                        <p>: {{ $order->transkrip_idn_qty }} Lembar</p>
                                    </div>
                                    @if ($order->ijazah_eng_qty > 0 || $order->transkrip_eng_qty > 0)
                                        <p class="mt-1 font-semibold">Bahasa Inggris</p>
                                    @endif
                                    <div class="{{ $order->ijazah_eng_qty > 0 ? 'grid grid-cols-2 ' : 'hidden' }}">
                                        <p>Ijazah</p>
                                        <p>: {{ $order->ijazah_eng_qty }} Lembar</p>
                                    </div>
                                    <div class="{{ $order->transkrip_eng_qty > 0 ? 'grid grid-cols-2' : 'hidden' }}">
                                        <p>Transkrip Nilai</p>
                                        <p>: {{ $order->transkrip_eng_qty }} Lembar</p>
                                    </div>
                                </td>

                                <td>{{ date('d M Y', strtotime($order->updated_at)) }}</td>

                                @php
                                    $statusClass = 'text-white bg-gray-600 border-gray-600 border rounded-lg px-2 py-1';
                                    $statusLabel = '';
                                    if ($order->status == 'Pending') {
                                        $statusLabel = 'Belum Dibayar';
                                    }
                                    if ($order->status == 'Confirm') {
                                        $statusClass = 'text-white bg-blue-600 border-blue-600 border rounded-lg px-2 py-1';
                                        $statusLabel = 'Menunggu Konfirmasi';
                                    }
                                    if ($order->status == 'Delivery') {
                                        $statusClass = 'rounded-lg px-2 py-1 border text-white bg-indigo-700 border-indigo-700';
                                        $statusLabel = 'Sedang Dikirim';
                                    }
                                    if ($order->status == 'Success') {
                                        $statusClass = 'rounded-lg px-2 py-1 border text-white bg-green-600 border-green-600';
                                        $statusLabel = 'Pesanan Selesai';
                                    }
                                    if ($order->status == 'Failed') {
                                        $statusClass = 'rounded-lg px-2 py-1 border text-white bg-red-600 border-red-600';
                                        $statusLabel = 'Pesanan Dibatalkan';
                                    }
                                @endphp

                                <td class="w-8 whitespace-normal">
                                    <div class="{{ $statusClass }}">{{ $statusLabel }}</div>
                                </td>
                                <td>
                                    @if ($order->status == 'Confirm')
                                        <button wire:click="setOpenModal('confirm',{{ $order->id }})"
                                            wire:loading.attr='disabled' wire:loading.class='disabled'
                                            class="btn btn-sm btn-circle btn-ghost">
                                            <i class="text-xl text-green-600 fas fa-check"></i>
                                        </button>
                                        <button wire:click="setOpenModal('reject',{{ $order->id }})"
                                            wire:loading.attr='disabled' wire:loading.class='disabled'
                                            class="btn btn-sm btn-circle btn-ghost">
                                            <i class="text-xl text-red-600 fas fa-xmark"></i>
                                        </button>
                                    @elseif ($order->status == 'Delivery')
                                        <button wire:loading.attr='disabled' wire:loading.class='disabled'
                                            class="btn btn-sm btn-ghost normal-case">
                                            <span class="text-sm">Lacak</span>
                                        </button>
                                    @else
                                        <span class="text-sm">No Action</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data yang dapat ditampilkan
                            </td>
                        </tr>
                    @endif

                </tbody>
                <tfoot class="text-center">
                    <tr>
                        <th></th>
                        <th class="normal-case">No. Transaksi</th>
                        <th class="normal-case">Nama</th>
                        <th class="normal-case">Data Dokumen</th>
                        <th class="normal-case">Jumlah Pesanan</th>
                        <th class="normal-case">Tanggal</th>
                        <th class="normal-case">Status</th>
                        <th class="normal-case">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Modal Area --}}
    @if ($openModal)
        <div class="fixed z-[100] inset-0 overflow-y-auto ease-out duration-400">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    @if ($openModal == 'confirm')
                        <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="font-bold text-lg">
                                    Konfirmasi Pesanan
                                </div>
                                <div class="sm:w-96">
                                    <div class="text-gray-500 text-sm grid grid-cols-2">
                                        <span>ID Transaksi </span>
                                        <span>: {{ $selectedOrder?->transaction_id }}</span>
                                    </div>
                                    <div class="text-gray-500 text-sm grid grid-cols-2">
                                        <span>Jenis Kurir </span>
                                        <span>: {{ $selectedOrder?->shipment->courier_type }}</span>
                                    </div>
                                    <div class="text-gray-500 text-sm grid grid-cols-2">
                                        <span>Layanan Kurir </span>
                                        <span>:
                                            {{ $selectedOrder ? json_decode($selectedOrder->shipment->courier_service)->service : null }}</span>
                                    </div>
                                    <div class="text-gray-500 text-sm grid grid-cols-2">
                                        <span>Harga Pengiriman </span>
                                        <span>:
                                            Rp{{ number_format($selectedOrder?->shipment->courier_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <p>Nomor Resi</p>
                                <input type="text" class="input input-bordered w-full" wire:model="receipt_delivery">
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="update('Delivery')" {{ !$isSubmit ? 'disabled' : '' }}
                                        type="submit" class="btn btn-sm">
                                        Konfirmasi
                                    </button>
                                </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="setCloseModal()" type="button" class="btn btn-sm btn-outline">
                                        Kembali
                                    </button>
                                </span>
                            </div>
                        </form>
                    @endif
                    @if ($openModal == 'reject')
                        <form>
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="font-bold text-lg">
                                    Tolak Pesanan
                                </div>
                                <p class="text-gray-500 text-sm">ID Transaksi : {{ $selectedOrder?->transaction_id }}
                                </p>
                                <p>Apakah anda yakin ingin menolak pesanan ini?</p>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click.prevent="update('Failed')" type="button" class="btn btn-sm">
                                        Tolak
                                    </button>
                                </span>
                                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="setCloseModal()" type="button"
                                        class="btn btn-sm btn-outline">
                                        Kembali
                                    </button>
                                </span>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
