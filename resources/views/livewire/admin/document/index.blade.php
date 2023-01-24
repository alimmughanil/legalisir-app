<div
    class="max-h-[80vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
    <div
        class="overflow-scroll max-h-screen max-w-[80vh] sm:max-w-[63vh] lg:max-w-[185vh] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
        <table class="table w-full table-compact">
            <thead>
                <tr>
                    <th></th>
                    <th>Data Alumni</th>
                    <th>Tahun Lulus</th>
                    <th>Ijazah</th>
                    <th>Transkrip Nilai</th>
                    <th>Diajukan Pada</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <td>
                            <p class="font-semibold whitespace-normal w-44">{{ $document->user->name }}</p>
                            <p class="">
                                {{ $document->user->profile->phone ? $document->user->profile->phone : '' }}</p>
                        </td>
                        <td class="text-center">{{ $document->user->profile->graduated_at }}</td>
                        <td class="text-center"><button class="btn btn-xs btn-outline">Lihat</button></td>
                        <td class="text-center"><button class="btn btn-xs">Lihat</button></td>
                        <td class="text-center">{{ date('d M Y', strtotime($document->updated_at)) }}</td>
                        @php
                            $statusClass = '';
                            $statusLabel = 'Menunggu Validasi';
                            if ($document->status == 'Confirm') {
                                $statusClass = 'text-white bg-green-600 border-green-600';
                                $statusLabel = 'Valid';
                            }
                            if ($document->status == 'Reject') {
                                $statusClass = 'text-white bg-red-600 border-red-600';
                                $statusLabel = 'Ditolak';
                            }
                        @endphp
                        <td>
                            <div class="font-medium badge badge-sm {{ $statusClass }}">{{ $statusLabel }}</div>
                        </td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-circle btn-ghost">
                                <i class="text-xl text-green-600 fas fa-check"></i>
                            </a>
                            <a href="" class="btn btn-sm btn-circle btn-ghost">
                                <i class="text-xl text-red-600 fas fa-xmark"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Data Alumni</th>
                    <th>Tahun Lulus</th>
                    <th>Ijazah</th>
                    <th>Transkrip Nilai</th>
                    <th>Diajukan Pada</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
