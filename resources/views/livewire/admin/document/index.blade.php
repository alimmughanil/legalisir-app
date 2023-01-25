<div
    class="max-h-[80vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
    <div
        class="overflow-scroll max-h-screen max-w-[80vh] sm:max-w-[63vh] lg:max-w-[185vh] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
        <table class="table w-full table-compact">
            <thead>
                <tr class="text-center">
                    <th class="normal-case"></th>
                    <th class="normal-case">Data Alumni</th>
                    <th class="normal-case">Tahun Lulus</th>
                    <th class="normal-case">Ijazah</th>
                    <th class="normal-case">Transkrip Nilai</th>
                    <th class="normal-case">Surat Pernyataan</th>
                    <th class="normal-case">Diajukan Pada</th>
                    <th class="normal-case">Status</th>
                    <th class="normal-case">Aksi</th>
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
                        <td class="text-center"><button wire:click="showDocument('{{ $document->ijazah }}')"
                                class="btn btn-xs">Lihat</button></td>
                        <td class="text-center"><button wire:click="showDocument('{{ $document->transkrip }}')"
                                class="btn btn-xs btn-outline">Lihat</button></td>
                        <td class="text-center"><button wire:click="showDocument('{{ $document->statement_letter }}')"
                                class="btn btn-xs btn-outline btn-primary">Lihat</button></td>
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
                            @if ($document->status == 'Pending')
                                <a wire:click="$set('documentId',{{ $document->id }})" href="#confirm"
                                    class="btn btn-sm btn-circle btn-ghost">
                                    <i class="text-xl text-green-600 fas fa-check"></i>
                                </a>
                                <a wire:click="$set('documentId',{{ $document->id }})" href="#reject"
                                    class="btn btn-sm btn-circle btn-ghost">
                                    <i class="text-xl text-red-600 fas fa-xmark"></i>
                                </a>
                            @else
                                <p>No Action</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <th class="normal-case"></th>
                    <th class="normal-case">Data Alumni</th>
                    <th class="normal-case">Tahun Lulus</th>
                    <th class="normal-case">Ijazah</th>
                    <th class="normal-case">Transkrip Nilai</th>
                    <th class="normal-case">Surat Pernyataan</th>
                    <th class="normal-case">Diajukan Pada</th>
                    <th class="normal-case">Status</th>
                    <th class="normal-case">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
{{-- Modal Area --}}
<div class="modal" id="confirm">
    <div class="modal-box">
        <h3 class="text-lg font-bold">
            Apakah anda yakin untuk konfirmasi pengajuan dokumen ini?
        </h3>
        <div class="modal-action">
            <a href="#" class="btn btn-outline">
                Tidak
            </a>
            <button onclick="submit('confirm')" id="confirmBtn" class="btn">
                Ya
            </button>
        </div>
    </div>
</div>
<div class="modal" id="reject">
    <div class="modal-box">
        <h3 class="text-lg font-bold">
            Apakah anda yakin untuk menolak pengajuan dokumen ini?
        </h3>
        <div class="modal-action">
            <a href="#" class="btn btn-outline">
                Tidak
            </a>
            <button onclick="submit('reject')" id="rejectBtn" class="btn">
                Ya
            </button>
        </div>
    </div>
</div>

{{-- Scripts --}}
@push('scripts')
    <script>
        function submit(type) {
            type == 'confirm' ? document.getElementById('confirmBtn').disabled = true : null;
            type == 'reject' ? document.getElementById('rejectBtn').disabled = true : null;
            Livewire.emit('submit', type)
        }
    </script>
@endpush
