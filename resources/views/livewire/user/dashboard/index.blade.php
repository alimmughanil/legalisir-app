<div>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        <a href="/order?active=payment" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-clock"></i>
                <div class="text-3xl font-bold">{{ $paymentPending }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Belum Dibayar</div>
        </a>
        <a href="/order?active=processing" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-check-to-slot"></i>
                <div class="text-3xl font-bold">{{ $orderPending }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Sedang Diproses</div>
        </a>
        <a href="/order?active=delivery" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-truck-fast"></i>
                <div class="text-3xl font-bold">{{ $orderDelivery }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Sedang Dikirim</div>
        </a>
        <a href="/order" class="p-4 border shadow-md rounded-2xl hover:border-gray-600 hover:shadow-lg">
            <div class="flex flex-row items-center justify-center gap-2 mb-2">
                <i class="text-2xl text-gray-600 fas fa-clipboard"></i>
                <div class="text-3xl font-bold">{{ $orderTotal }}</div>
            </div>
            <div class="text-xs font-semibold text-center">Semua Pesanan</div>
        </a>
    </div>

    <div class="w-full p-6 mt-8 text-center">
        <a href="/order/create" class="normal-case btn btn-primary btn-lg">
            Pesan Legalisir Ijazah
        </a>
    </div>
</div>
