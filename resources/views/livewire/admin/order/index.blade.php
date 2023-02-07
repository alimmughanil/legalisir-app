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
                                    <p class="font-semibold whitespace-normal w-44">{{ $order->user->name }}</p>
                                    <p class="">{{ $order->user->profile->phone }}</p>
                                </td>
                                <td><button class="btn btn-sm btn-outline">Lihat</button></td>
                                <td class="my-2 text-left">
                                    <p class="font-semibold">Bahasa Indonesia</p>
                                    <div class="grid grid-cols-2">
                                        <p>Ijazah</p>
                                        <p>: {{ $order->ijazah_idn_qty }} Lembar</p>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <p>Transkrip Nilai</p>
                                        <p>: {{ $order->transkrip_idn_qty }} Lembar</p>
                                    </div>
                                    <p class="mt-1 font-semibold">Bahasa Inggris</p>
                                    <div class="grid grid-cols-2">
                                        <p>Ijazah</p>
                                        <p>: {{ $order->ijazah_eng_qty }} Lembar</p>
                                    </div>
                                    <div class="grid grid-cols-2">
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
                                    <a href="" class="btn btn-sm btn-circle btn-ghost">
                                        <i class="text-xl text-green-600 fas fa-check"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-circle btn-ghost">
                                        <i class="text-xl text-red-600 fas fa-xmark"></i>
                                    </a>
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
</div>
