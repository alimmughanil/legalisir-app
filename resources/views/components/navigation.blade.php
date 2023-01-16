<div class="flex flex-row items-start">
    <div class="hidden md:block w-72 min-h-screen shadow-lg border relative" id="sidebar">
        <div class="pt-4 pb-2 px-6">
            <a href="/">
                <div class="flex flex-col justify-center items-center">
                    <div class="shrink-0">
                        <img src="image/logo.svg" class="rounded-full w-10" alt="Avatar">
                    </div>
                    <div class="grow ml-3">
                        <p class="text-lg font-semibold text-gray-600">Legalisir App</p>
                    </div>
                </div>
            </a>
        </div>
        <ul class="relative">
            <li class="relative">
                <a class="flex items-center gap-4 py-4 text-sm px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                    href="/dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="relative">
                <a class="flex items-center gap-4 py-4 text-sm px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                    href="/legalize">
                    <i class="fa-solid fa-file"></i>
                    <span class="pl-1">Data Legalisir</span>
                </a>
            </li>
            <li class="relative" id="OrderMenu">
                <a class="flex items-center gap-4 py-4 text-sm px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out cursor-pointer"
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
                        <a href="/order/payment"
                            class="flex flex-row items-center gap-2 text-xs pl-12 ml-2 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out">
                            <i class="fas fa-circle text-gray-500"></i>
                            <span>Menunggu Pembayaran</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a href="/order/confirmation"
                            class="flex flex-row items-center gap-2 text-xs pl-12 ml-2 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out">
                            <i class="fas fa-circle text-gray-500"></i>
                            <span>Menunggu Konfirmasi</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a href="/order/shipment"
                            class="flex flex-row items-center gap-2 text-xs pl-12 ml-2 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out">
                            <i class="fas fa-circle text-gray-500"></i>
                            <span>Menunggu Pengiriman</span>
                        </a>
                    </li>
                    <li class="relative">
                        <a href="/order"
                            class="flex flex-row items-center gap-2 text-xs pl-12 ml-2 pr-6 h-6 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out">
                            <i class="fas fa-circle text-gray-500"></i>
                            <span>Semua Pesanan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative">
                <a class="flex items-center gap-4 py-4 text-sm px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                    href="/profile">
                    <i class="fas fa-user"></i>
                    <span class="ml-[0.17rem]">Profil Saya</span>
                </a>
            </li>
        </ul>
        <div class="text-center w-full absolute bottom-0 shadow-md">
            <hr class="m-0">
            <p class="py-2 text-sm text-gray-700">Copyright@2023</p>
        </div>
    </div>
    <div class="flex flex-col items-start gap-8 w-full px-8">
        <div class="hidden md:block w-full">
            <nav class="navbar shadow-md rounded-2xl border mt-2">
                <div class="navbar-start px-4">
                    <div class="hover:scale-105 duration-100">
                        <h1 class="text-lg text-gray-500">@yield('title')</h1>
                    </div>
                </div>
                <div class="navbar-end px-4">
                    <div class="dropdown dropdown-end">
                        <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="w-11 normal-case rounded-full border-2 p-1">
                                <img src={{ '/image/logo.svg' }} alt="Akun" />
                            </div>
                        </label>
                        <ul tabIndex="0" class="mt-3 p-2 shadow dropdown-content bg-base-100 rounded-box w-max">
                            <li class="cursor-pointer hover:text-primary p-2 hover:scale-105">
                                <a class="flex items-center gap-4 p-2 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded-lg hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
                                    href="/profile">
                                    <i class="fas fa-user"></i>
                                    <span class="">Profil Saya</span>
                                </a>
                            </li>
                            <li class="cursor-pointer hover:text-primary p-2 hover:scale-105">
                                <a class="flex items-center gap-4 p-2 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded-lg hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out"
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
        <div class="block md:hidden w-full">
            <x-navbar />
        </div>
        <div class="mt-0 w-full">
            {{ $slot }}
        </div>
    </div>
</div>

{{-- Modal Area --}}
{{-- Logout --}}
<div class="modal" id="logout-confirm">
    <div class="modal-box">
        <h3 class="font-bold text-lg">
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
