@extends('layouts.app')

@section('content')
    <div class="flex justify-center w-full sm:py-2">
        <nav class="flex z-[999] bg-gray-50 items-center justify-between container fixed shadow p-2 sm:border sm:border-gray-100 sm:rounded-lg"
            aria-label="Global">
            <div class="flex lg:min-w-0 lg:flex-1" aria-label="Global">
                <a href="/" class="-m-1.5 p-1.5">
                    <div class="flex items-center gap-2">
                        <img class="h-8" src="/image/logo.svg" alt="">
                        <span class="text-lg text-gray-500">Legalisirku</span>
                    </div>
                </a>
            </div>

            <div class="hidden lg:flex lg:min-w-0 lg:flex-1 lg:justify-center lg:gap-x-12">
                <a href="#benefit" class="font-semibold text-gray-900 hover:text-gray-900">Benefit</a>
                <a href="#partner" class="font-semibold text-gray-900 hover:text-gray-900">Mitra Sekolah</a>
                <a href="#registration-partner" class="font-semibold text-gray-900 hover:text-gray-900">
                    Pendaftaran Mitra
                </a>
            </div>
            <div class="hidden lg:flex items-center justify-end lg:flex-1 min-w-0 gap-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard.index') }}"
                            class="inline-block rounded-lg px-3 py-1.5 text-sm font-semibold leading-6 text-gray-900 shadow-sm ring-1 ring-gray-900/10 hover:bg-gray-50">
                            Dashboard
                        </a>
                        <div class="hidden">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="inline-block rounded-lg px-3 py-1.5 text-sm font-semibold leading-6 text-gray-900 shadow-sm ring-1 ring-gray-900/10 hover:bg-gray-50">
                                Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="hidden md:block">
                            <a href="{{ route('login') }}"
                                class="inline-block rounded-lg px-3 py-1.5 text-sm font-semibold leading-6 text-gray-100 shadow-sm ring-1 bg-gray-600 ring-gray-900/10 hover:bg-gray-700">Log
                                in</a>
                        </div>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block rounded-lg px-3 py-1.5 text-sm font-semibold leading-6 text-gray-900 shadow-sm ring-1 ring-gray-900/10 hover:bg-gray-50">Register</a>
                        @endif
                    @endauth
                @endif
                {{--  --}}
            </div>
            <div class="flex lg:hidden pr-4">
                <button onclick="document.getElementById('menu').classList.toggle('hidden')"
                    class="btn btn-sm btn-ghost btn-circle">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </nav>
    </div>
    <div class="hidden" id="menu">
        <div class="flex z-[1000] mt-16 sticky-top ml-auto flex-col bg-white rounded-lg gap-2 shadow-sm">
            <a href="{{ route('dashboard.index') }}"
                class="inline-block text-center rounded-lg px-3 py-1.5 text-sm font-semibold leading-6 text-gray-900 shadow-sm ring-1 ring-gray-900/10 hover:bg-gray-50">
                Dashboard
            </a>
            <a href="#benefit" class="font-semibold text-center text-gray-900 hover:text-gray-900">Benefit</a>
            <a href="#partner" class="font-semibold text-center text-gray-900 hover:text-gray-900">Mitra Sekolah</a>
            <a href="#registration-partner" class="font-semibold text-center text-gray-900 hover:text-gray-900">
                Pendaftaran Mitra
            </a>
        </div>
    </div>
    <div class="relative -mt-4 w-full min-h-screen bg-gradient-to-b from-blue-900 to-blue-50 outline-none border-b-0">
        <div class="max-w-3xl mx-auto pt-48 pb-40">
            <div>
                <h1 class="font-bold tracking-tight text-center text-6xl text-gray-100">Legalisirku</h1>
                <p class="mt-6 text-lg leading-8 text-center text-gray-100 sm:text-gray-200">Sistem Informasi Legalisir
                    Ijazah Sekolah</p>
                <div class="flex mt-8 gap-x-4 justify-center">
                    <a href="{{ route('login') }}"
                        class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
                        Pesan Sekarang
                        <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="benefit"
        class="relative px-4 sm:px-0 w-full min-h-screen bg-gradient-to-b from-blue-50 to-white outline-none border-t-0">
        <div class="flex flex-col-reverse sm:flex-row justify-center w-full h-full pt-28 gap-4">
            <img class="w-[300px] image-full rounded-lg shadow-sm mx-auto sm:mx-0"
                src="https://pixabay.com/get/g704f8c868454529a30878330cf976cbd680baa31107ba28b25d8ee3fd47c03d2a07c6e9ddc13fb60be00f1ea5905377589d9cb75d7ce4bcb023413e6949ef7c68499a6f6f0bbc0eca80a0337bcf9ed60_1920.jpg"
                alt="">
            <div>
                <h1 class="font-bold tracking-tight text-start text-2xl text-gray-700">Mengapa Harus Menggunakan Layanan
                    Kami?</h1>
                <ul class="max-w-[40rem] pl-4 text-left">
                    <li class="list-disc mt-6 text-lg leading-8 text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </li>
                    <li class="list-disc mt-6 text-lg leading-8 text-gray-600">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, optio perferendis.
                    </li>
                    <li class="list-disc mt-6 text-lg leading-8 text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae incidunt provident dicta dolores vel?
                    </li>
                    <li class="list-disc mt-6 text-lg leading-8 text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae!
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="partner" class="relative w-full min-h-screen">
        <div class="flex flex-col sm:flex-row justify-center w-full h-full pt-28 gap-4">
            <div>
                <h1 class="font-bold tracking-tight text-center text-2xl text-gray-700">
                    Mitra Sekolah Terdaftar
                </h1>
                <div class="flex flex-wrap gap-4 pt-4 sm:max-w-[80vw] justify-center items-center">
                    @php
                        $i = 0;
                    @endphp
                    @for ($i = 0; $i < 20; $i++)
                        <img width="120px" class="border rounded-lg shadow-lg p-3"
                            src="https://upload.wikimedia.org/wikipedia/id/6/67/Logo_Universitas_Islam_Negeri_Walisongo.png"
                            alt="">
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div id="registration-partner" class="relative w-full min-h-screen flex justify-center items-center">
        <div class="border p-8 shadow-lg rounded-lg">
            <h1 class="font-bold tracking-tight text-center text-2xl text-gray-700">
                Gabung Sebagai Mitra
            </h1>
            <p class="mt-6 text-lg leading-8 text-center text-gray-600">
                Ayo gabung bersama kami dan rasakan manfaatnya sekarang!
            </p>
            <div class="flex mt-8 gap-x-4 justify-center">
                <a href="/register/school"
                    class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
                    Pendaftaran Mitra Sekolah
                    <span class="text-indigo-200" aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </div>
    <footer class="flex justify-center py-4 border">
        <div class="text-gray-700">Copyright@<?= now()->year ?> - {{ config('app.name') }}</div>
    </footer>
@endsection
