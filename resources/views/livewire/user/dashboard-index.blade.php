@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="/order/payment" class="border shadow-md rounded-2xl p-4 hover:border-gray-600 hover:shadow-lg">
                <div class="flex flex-row gap-2 mb-2 items-center justify-center">
                    <i class="fas fa-clock text-2xl text-gray-600"></i>
                    <div class="text-3xl font-bold">1</div>
                </div>
                <div class="text-xs text-center font-semibold">Menunggu Pembayaran</div>
            </a>
            <a href="/order/confirmation" class="border shadow-md rounded-2xl p-4 hover:border-gray-600 hover:shadow-lg">
                <div class="flex flex-row gap-2 mb-2 items-center justify-center">
                    <i class="fas fa-check-to-slot text-2xl text-gray-600"></i>
                    <div class="text-3xl font-bold">1</div>
                </div>
                <div class="text-xs text-center font-semibold">Menunggu Konfirmasi</div>
            </a>
            <a href="/order/shipment" class="border shadow-md rounded-2xl p-4 hover:border-gray-600 hover:shadow-lg">
                <div class="flex flex-row gap-2 mb-2 items-center justify-center">
                    <i class="fas fa-truck-fast text-2xl text-gray-600"></i>
                    <div class="text-3xl font-bold">1</div>
                </div>
                <div class="text-xs text-center font-semibold">Menunggu Pengiriman</div>
            </a>
            <a href="/order" class="border shadow-md rounded-2xl p-4 hover:border-gray-600 hover:shadow-lg">
                <div class="flex flex-row gap-2 mb-2 items-center justify-center">
                    <i class="fas fa-clipboard text-2xl text-gray-600"></i>
                    <div class="text-3xl font-bold">1</div>
                </div>
                <div class="text-xs text-center font-semibold">Semua Pesanan</div>
            </a>
        </div>

        <div class="w-full p-6 mt-8 text-center">
            <a href="/order/create" class="btn btn-primary btn-lg normal-case">
                Pesan Legalisir Ijazah
            </a>
        </div>
    </x-navigation>
@endsection
