<div class="flex flex-row items-start">
    <div class="relative hidden min-h-screen border shadow-lg md:block w-72" id="sidebar">
        <div class="px-6 pt-4 pb-2">
            <a href="/">
                <div class="flex flex-col items-center justify-center">
                    <div class="shrink-0">
                        <img src="/image/logo.svg" class="w-10 rounded-full" alt="Avatar">
                    </div>
                    <div class="ml-3 grow">
                        <p class="text-lg font-semibold text-gray-600">Legalisir App</p>
                    </div>
                </div>
            </a>
        </div>
        <ul class="relative">
            <li class="relative">
                <a class="flex items-center h-12 gap-4 px-6 py-4 overflow-hidden text-sm text-gray-700 transition duration-300 ease-in-out rounded text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50"
                    href="/dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="relative">
                <a class="flex items-center h-12 gap-4 px-6 py-4 overflow-hidden text-sm text-gray-700 transition duration-300 ease-in-out rounded text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50"
                    href="/document">
                    <i class="fa-solid fa-file"></i>
                    <span class="pl-1">Data Dokumen</span>
                </a>
            </li>
            <li class="relative" id="OrderMenu">
                <a class="flex items-center h-12 gap-4 px-6 py-4 overflow-hidden text-sm text-gray-700 transition duration-300 ease-in-out rounded cursor-pointer text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50"
                    data-bs-toggle="collapse" data-bs-target="#collapseOrderMenu" aria-expanded="false"
                    aria-controls="collapseOrderMenu">
                    <i class="fas fa-clipboard"></i>
                    <div class="flex items-center gap-4 pl-1">
                        <span>Pesanan Saya</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </a>
                <ul class="relative accordion-collapse collapse" id="collapseOrderMenu" aria-labelledby="OrderMenu"
                    data-bs-parent="#sidebar">
                    <li class="relative">
                        <a href="/order#payment"
                            class="flex flex-row items-center h-6 gap-2 pl-12 pr-6 ml-2 overflow-hidden text-xs text-gray-700 transition duration-300 ease-in-out rounded text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50">
                            <i class="text-gray-500 fas fa-circle"></i>
                            <span>Menunggu Pembayaran</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a href="/order#confirmation"
                            class="flex flex-row items-center h-6 gap-2 pl-12 pr-6 ml-2 overflow-hidden text-xs text-gray-700 transition duration-300 ease-in-out rounded text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50">
                            <i class="text-gray-500 fas fa-circle"></i>
                            <span>Menunggu Konfirmasi</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a href="/order#shipment"
                            class="flex flex-row items-center h-6 gap-2 pl-12 pr-6 ml-2 overflow-hidden text-xs text-gray-700 transition duration-300 ease-in-out rounded text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50">
                            <i class="text-gray-500 fas fa-circle"></i>
                            <span>Menunggu Pengiriman</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a href="/order"
                            class="flex flex-row items-center h-6 gap-2 pl-12 pr-6 ml-2 overflow-hidden text-xs text-gray-700 transition duration-300 ease-in-out rounded text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50">
                            <i class="text-gray-500 fas fa-circle"></i>
                            <span>Semua Pesanan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative">
                <a class="flex items-center h-12 gap-4 px-6 py-4 overflow-hidden text-sm text-gray-700 transition duration-300 ease-in-out rounded text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50"
                    href="/profile">
                    <i class="fas fa-user"></i>
                    <span class="ml-[0.17rem]">Profil Saya</span>
                </a>
            </li>
        </ul>
        <div class="absolute bottom-0 w-full text-center shadow-md">
            <hr class="m-0">
            <p class="py-2 text-sm text-gray-700">Copyright@2023</p>
        </div>
    </div>
    <div class="flex flex-col items-start w-full gap-2 px-4 sm:gap-8 md:px-8">
        <div class="hidden w-full md:block">
            <nav class="mt-2 border shadow-md navbar rounded-2xl">
                <div class="px-4 navbar-start">
                    <div class="duration-100 hover:scale-105">
                        <h1 class="text-lg text-gray-500">@yield('title')</h1>
                    </div>
                </div>
                <div class="px-4 navbar-end">
                    <div class="dropdown dropdown-end">
                        <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="normal-case border-2 rounded-full w-11">
                                @if (Auth::user())
                                    <img src="{{ Auth::user()->profile->photo }}" class="w-10 rounded-full"
                                        alt="Avatar">
                                @else
                                    <img src="/image/logo.svg" class="w-10 rounded-full" alt="Avatar">
                                @endif
                            </div>
                        </label>
                        <ul tabIndex="0" class="p-2 mt-3 shadow dropdown-content bg-base-100 rounded-box w-max">
                            <li class="p-2 cursor-pointer hover:text-primary hover:scale-105">
                                <a class="flex items-center gap-4 p-2 overflow-hidden text-gray-700 transition duration-300 ease-in-out rounded-lg text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50"
                                    href="/profile">
                                    <i class="fas fa-user"></i>
                                    <span class="">Profil Saya</span>
                                </a>
                            </li>
                            <li class="p-2 cursor-pointer hover:text-primary hover:scale-105">
                                <a class="flex items-center gap-4 p-2 overflow-hidden text-gray-700 transition duration-300 ease-in-out rounded-lg text-ellipsis whitespace-nowrap hover:text-blue-600 hover:bg-blue-50"
                                    href="#logout-confirm">
                                    <i class="fas fa-right-from-bracket"></i>
                                    <span class="">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="block w-full md:hidden">
            <x-navbar />
        </div>
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
</div>

{{-- Modal Area --}}
{{-- Logout --}}
<div class="modal" id="logout-confirm">
    <div class="modal-box">
        <h3 class="text-lg font-bold">
            Apakah anda yakin ingin keluar?
        </h3>
        <div class="modal-action">
            <a href="#" class="btn btn-outline">
                Tidak
            </a>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn">
                Ya
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</div>
