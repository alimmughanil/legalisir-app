<div>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        <a href="/document?status=pending" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-clock"></i>
                <div class="text-3xl font-bold">{{ $documentValidation }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Permintaan Validasi Dokumen</div>
        </a>
        <a href="/account" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-check-to-slot"></i>
                <div class="text-3xl font-bold">{{ $studentCount }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Alumni Terdaftar</div>
        </a>
        <a href="/order" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-truck-fast"></i>
                <div class="text-3xl font-bold">{{ $orderTotal }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Semua Transaksi</div>
        </a>
        <a href="/order?status=pending" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-clipboard"></i>
                <div class="text-3xl font-bold">{{ $orderConfirm }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Transaksi Baru</div>
        </a>
    </div>
</div>
