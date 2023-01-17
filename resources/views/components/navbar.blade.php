<div class="flex flex-col w-full">
    <div class="block md:hidden fixed -top-2 left-0 right-0 bg-base-100 shadow-md z-[999]">
        <div class="flex-row gap-2 navbar">
            <div class="w-[80%]">
                <a href="/" class="flex items-center gap-2 px-2 duration-100 hover:scale-105">
                    <img src="/image/logo.svg" class="h-8" alt="Legalisir App" />
                    <span class="text-xl text-gray-500">Legalisir App</span>
                </a>
            </div>
            <div class="w-[20%] justify-end">
                <div class="pr-1 dropdown dropdown-end">
                    <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 normal-case border-2 rounded-full">
                            <img src={{ '/image/logo.svg' }} alt="Akun" class="w-[100px]" />
                        </div>
                    </label>
                    <ul tabIndex="0" class="p-2 mt-3 shadow dropdown-content bg-base-100 rounded-box w-max">
                        <li class="p-4 h-max">
                            <div class="flex flex-col items-center justify-center gap-y-6">
                                <div class="flex flex-row items-start gap-x-3">
                                    <div class="avatar">
                                        <div class="w-10 h-10 border-2 rounded-full">
                                            <img src='/image/logo.svg' alt="Akun" class="w-[100px]" />
                                        </div>
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <div class="font-bold">Nama</div>
                                        <p class="text-sm">Email</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start justify-around w-full gap-6">
                                    <a class='cursor-pointer hover:text-primary' href="/dashboard">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <div class="pl-1">Dashboard</div>
                                        </div>
                                    </a>
                                    <a class='cursor-pointer hover:text-primary' href="/legalize">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-file"></i>
                                            <div class="pl-2">Data Legalisir</div>
                                        </div>
                                    </a>
                                    <a class='cursor-pointer hover:text-primary' href="/order">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-clipboard"></i>
                                            <div class="pl-2">Pesanan</div>
                                        </div>
                                    </a>

                                    <a class='cursor-pointer hover:text-primary' href="/profile">
                                        <div class="flex flex-row items-center gap-2">
                                            <i class="fas fa-user"></i>
                                            <div class="pl-2">Profil</div>
                                        </div>
                                    </a>
                                    <a class="text-gray-700 cursor-pointer hover:text-primary" href="#logout-confirm">
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
    <h1 class="w-full mt-20 text-lg font-semibold text-center ">@yield('title')</h1>
</div>
