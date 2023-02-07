<div class="w-full mx-auto card md:w-96">
    <div class="justify-center text-center card-body">
        <div class="p-4 text-center border border-gray-400 rounded-lg">
            <p class="text-lg text-gray-500">Nomor Transaksi</p>
            <p class="font-bold">{{ $payment->order->transaction_id }}</p>
        </div>
        <div class="p-4 text-center border border-gray-400 rounded-lg">
            <p class="text-lg text-gray-500">Nominal</p>
            <p class="font-bold">Rp{{ number_format($payment->order->price_amount, 0, ',', '.') }}</p>
        </div>
        <button wire:click="updatePayment()" class="normal-case btn btn-primary ">Bayar</button>
    </div>
</div>
