<div class="flex flex-col w-full">
    <div class="block md:hidden fixed -top-2 left-0 right-0 bg-base-100 shadow-md z-[999]">
        <div class="navbar flex-row gap-2">
            <div class="w-[80%]">
                <a href="/" class="hover:scale-105 duration-100 px-2 flex items-center gap-2">
                    <img src="/image/logo.svg" class="h-8" alt="Legalisir App" />
                    <span class="text-gray-500 text-xl">Legalisir App</span>
                </a>
            </div>
            <div class="w-[20%] justify-end">
                <div class="dropdown dropdown-end pr-1">
                    <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 normal-case rounded-full border-2">
                            <img src={{ '/image/logo.svg' }} alt="Akun" class="w-[100px]" />
                        </div>
                    </label>
                    <ul tabIndex="0" class="mt-3 p-2 shadow dropdown-content bg-base-100 rounded-box w-max">
                        <li class="h-max p-4">
                            <div class="flex flex-col items-center gap-y-6 justify-center">
                                <div class="flex flex-row gap-x-3 items-start">
                                    <div class="avatar">
                                        <div class="w-10 h-10 rounded-full border-2">
                                            <img src='/image/logo.svg' alt="Akun" class="w-[100px]" />
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <div class="font-bold">Nama</div>
                                        <p class="text-sm">Email</p>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full items-start justify-around gap-6">
                                    <a class='cursor-pointer hover:text-primary' href="/dashboard">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <div class="pl-1">Dashboard</div>
                                        </div>
                                    </a>
                                    <a class='cursor-pointer hover:text-primary' href="/order">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-clipboard"></i>
                                            <div class="pl-2">Pesanan</div>
                                        </div>
                                    </a>
                                    <a class='cursor-pointer hover:text-primary' href="/order">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-file"></i>
                                            <div class="pl-2">Data Legalisir</div>
                                        </div>
                                    </a>

                                    <a class='cursor-pointer hover:text-primary' href="/profile">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-user"></i>
                                            <div class="pl-2">Profil</div>
                                        </div>
                                    </a>
                                    <a class="cursor-pointer text-gray-700 hover:text-primary" href="#logout-confirm">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <div class="pl-2">Logout</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h1 class="mt-20 text-lg font-semibold text-center w-full ">@yield('title')</h1>
</div>
