<div class="flex flex-col w-full">
    <div class="block lg:hidden fixed -top-2 left-0 right-0 bg-base-100 shadow-md z-[999]">
        <div class="flex-row gap-2 navbar">
            <div class="w-[80%]">
                <a href="/" class="flex items-center gap-2 px-2 duration-100 hover:scale-105">
                    <img src="/image/logo.svg" class="h-8" alt="Legalisir App" />
                    <span class="text-xl text-gray-500">{{ config('app.name') }}</span>
                </a>
            </div>
            <div class="w-[20%] justify-end">
                <div class="pr-1 dropdown dropdown-end">
                    <label tabIndex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 normal-case border-2 rounded-full">
                            @if (Auth::user()->role == 'User')
                                <img src="{{ Auth::user()->profile->photo }}" class="w-10 rounded-full" alt="Avatar">
                            @elseif (Auth::user()->role == 'Admin')
                                <img src="{{ Auth::user()->school->school_icon }}" class="w-10 rounded-full"
                                    alt="Avatar">
                            @else
                                <img src="/image/logo.svg" class="w-10 rounded-full" alt="Avatar">
                            @endif
                        </div>
                    </label>
                    <ul tabIndex="0" class="p-2 mt-3 shadow dropdown-content bg-base-100 rounded-box w-max">
                        <li class="p-4 h-max">
                            <div class="flex flex-col items-center justify-center gap-y-6">
                                @if (Auth::check())
                                    @if (Auth::user()->role != 'Super Admin')
                                        <div class="flex flex-row items-start gap-x-3">
                                            <div class="avatar">
                                                <div class="w-10 h-10 border-2 rounded-full">
                                                    @if (Auth::user()->role == 'User')
                                                        <img src="{{ Auth::user()->profile->photo }}"
                                                            class="w-10 rounded-full" alt="Avatar">
                                                    @elseif (Auth::user()->role == 'Admin')
                                                        <img src="{{ Auth::user()->school->school_icon }}"
                                                            class="w-10 rounded-full" alt="Avatar">
                                                    @else
                                                        <img src="/image/logo.svg" class="w-10 rounded-full"
                                                            alt="Avatar">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex flex-col w-full">
                                                <div class="font-bold">{{ Auth::user()->name }}</div>
                                                <p class="text-sm">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-start justify-around w-full gap-6">
                                            <a class='cursor-pointer hover:text-primary' href="/dashboard">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                    <div class="pl-1">Dashboard</div>
                                                </div>
                                            </a>
                                            <a class='cursor-pointer hover:text-primary' href="/document">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-file"></i>
                                                    <div class="pl-2">Data Dokumen</div>
                                                </div>
                                            </a>
                                            <a class='cursor-pointer hover:text-primary' href="/order">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-clipboard"></i>
                                                    <div class="pl-2">
                                                        {{ Auth::user()->role == 'Admin' ? 'Data Pesanan' : 'Pesanan Saya' }}
                                                    </div>
                                                </div>
                                            </a>

                                            @if (Auth::user()->role == 'Admin')
                                                <a class='cursor-pointer hover:text-primary' href="/account">
                                                    <div class="flex flex-row items-center gap-2">
                                                        <i class="fas fa-users"></i>
                                                        <div class="">
                                                            Data Alumni
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                            <a class='cursor-pointer hover:text-primary' href="/profile">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-user"></i>
                                                    <div class="pl-1">
                                                        {{ Auth::user()->role == 'Admin' ? 'Profil Sekolah' : 'Profil Saya' }}
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="text-gray-700 cursor-pointer hover:text-primary"
                                                href="#logout-confirm">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <div class="">Logout</div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @if (Auth::user()->role == 'Super Admin')
                                        <div class="flex flex-col items-start justify-around w-full gap-6">
                                            <a class='cursor-pointer hover:text-primary' href="/dashboard">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                    <div class="pl-1">Dashboard</div>
                                                </div>
                                            </a>
                                            <a class='cursor-pointer hover:text-primary' href="/account">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-school"></i>
                                                    <div class="">Data Sekolah</div>
                                                </div>
                                            </a>

                                            <a class='cursor-pointer hover:text-primary' href="/about">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fa-solid fa-rocket"></i>
                                                    <div class="pl-1">
                                                        <span class="">Data Aplikasi</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="text-gray-700 cursor-pointer hover:text-primary"
                                                href="#logout-confirm">
                                                <div class="flex flex-row items-center gap-2">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <div class="pl-1">Logout</div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="flex flex-col items-start justify-around w-full gap-6">
                                        <a class='cursor-pointer hover:text-primary' href="/login">
                                            Login
                                        </a>
                                        <a class='cursor-pointer hover:text-primary' href="/register">
                                            Register
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h1 class="w-full mt-20 text-lg font-semibold text-center">@yield('title')</h1>
</div>
