<div
    class="max-h-[80vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
    <div
        class="overflow-scroll max-h-screen max-w-[80vh] sm:max-w-[63vh] lg:max-w-[185vh] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
        <table class="table w-full table-compact">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Nomor Handphone</th>
                    <th>Tahun Lulus</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Alamat Rumah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($graduatedUsers as $graduatedUser)
                    <tr>
                        <th>{{ $i++ }}</th>
                        <td class="whitespace-normal">{{ $graduatedUser->name }}</td>
                        <td>{{ $graduatedUser->profile->phone ? $graduatedUser->profile->phone : 'Tidak Ada' }}</td>
                        <td>{{ $graduatedUser->profile->graduated_at ? $graduatedUser->profile->graduated_at : 'Tidak Ada' }}
                        </td>
                        <td class="whitespace-normal">
                            {{ $graduatedUser->profile->city ? $graduatedUser->profile->city : 'Tidak Ada' }}</td>
                        <td class="whitespace-normal">
                            {{ $graduatedUser->profile->province ? $graduatedUser->profile->province : 'Tidak Ada' }}
                        </td>
                        <td class="whitespace-normal">
                            {{ $graduatedUser->profile->address ? $graduatedUser->profile->address : 'Tidak Ada' }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-circle btn-ghost">
                                <i class="text-xl text-green-600 fab fa-whatsapp"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Nomor Handphone</th>
                    <th>Tahun Lulus</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Alamat Rumah</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
