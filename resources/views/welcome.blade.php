@extends('layouts.app')

@section('content')
    <div class="">
        <div class="navbar mx-auto fixed px-2 md:px-16 bg-white z-[999]">
            <div class="navbar-start">
                <a href="/">
                    <img src="/image/logo-legalisirku.png" alt="" class="w-28 py-2">
                </a>
            </div>
            <div class="navbar-end gap-2">
                <a href="/register" class="btn btn-outline btn-sm normal-case">Register</a>
                <a href="/login" class="btn btn-sm normal-case btn-primary">Login</a>
            </div>
        </div>
        <div class="flex flex-col-reverse md:flex-row md:justify-between items-center px-4 md:px-16 pt-16">
            <div class="flex flex-col gap-4">
                <p class="text-xl md:text-4xl font-bold font-[Quicksand] text-gray-900">Legalisir Dokumen Kapanpun,
                    dimanapun</p>
                <div class="">
                    <p class="text-sm md:text-base text-gray-600">Membantu Anda dalam pembuatan legalisir dokumen penting
                        dimanapun dan
                        kapanpun.
                    </p>
                    <p class="text-sm md:text-base text-gray-600">Legalisir Online meningkatkan kualitas layanan guna
                        menjawab
                        keresahan alumni dan penugasan pegawai
                        dengan lokasi yang jauh dan juga kecepatan dalam proses legalisir.</p>
                </div>
                <a href="/order/create" class="btn normal-case btn-primary w-max mx-auto md:mx-0 btn-sm text-lg">Pesan
                    Sekarang</a>
            </div>
            <img src="/image/legalisir.png" alt="" class="w-[32rem]">
        </div>
        <div class="px-4 md:px-16 py-16">
            <div class="flex flex-col gap-8">
                <div class="">
                    <p class="text-xl md:text-4xl font-bold font-[Quicksand] text-gray-900 text-center">Mengapa
                        Legalisir.com
                    </p>
                    <p class="text-sm md:text-base text-gray-600 text-center">Legalisir.com membantu Anda dalam pembuatan
                        legalisir
                        dokumen penting dimanapun dan kapanpun.
                    </p>
                </div>
                <div class="flex flex-row flex-wrap justify-center items-start gap-4">
                    <div class="flex flex-col justify-center items-center gap-2">
                        <div
                            class="p-8 bg-gray-100 rounded-3xl transition duration-0 hover:duration-300 hover:rounded-full">
                            <i class="fas fa-file-import fa-4x"></i>
                        </div>
                        <div class="w-full md:w-[20rem]">
                            <p class="text-xl md:text-xl font-bold font-[Quicksand] text-gray-900 text-center">Kemudahan</p>
                            <p class="text-sm md:text-base text-gray-600 text-center">Proses cepat & Akurat. CS Kami Cepat
                                merespons menjawab segala kebutuhan anda</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-2">
                        <div
                            class="p-8 bg-gray-100 rounded-3xl transition duration-0 hover:duration-300 hover:rounded-full">
                            <i class="fas fa-lock fa-4x"></i>
                        </div>
                        <div class="w-full md:w-[20rem]">
                            <p class="text-xl md:text-xl font-bold font-[Quicksand] text-gray-900 text-center">Keamanan</p>
                            <p class="text-sm md:text-base text-gray-600 text-center">Keamanan dokumen terjamin menggunakan
                                private cloud, sehingga aman dan privasi.</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-2">
                        <div
                            class="p-8 bg-gray-100 rounded-3xl transition duration-0 hover:duration-300 hover:rounded-full">
                            <i class="fa-sharp fa-solid fa-clock-rotate-left fa-4x"></i>
                        </div>
                        <div class="w-full md:w-[20rem]">
                            <p class="text-xl md:text-xl font-bold font-[Quicksand] text-gray-900 text-center">Kecepatan</p>
                            <p class="text-sm md:text-base text-gray-600 text-center">Kecepatan pengiriman menggunakan
                                ekspedisi bepengalaman, jangkauan dalam maupu luar negeri.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 md:px-16 py-16 bg-[#ffe2ff]">
            <div class="flex flex-col gap-8">
                <div class="">
                    <p class="text-xl md:text-4xl font-bold font-[Quicksand] text-gray-900 text-center">Legalisir Dokumen
                        Kapanpun, dimanapun
                    </p>
                    <p class="text-sm md:text-base text-gray-600 text-center">Kami melayani legalisir dokumen perusahaan,
                        legalisir ijazah, legalisir transkrip nilai, legalisir surat keterangan belum menikah/skbm,
                        legalisir skck/police record, legalisir akte kelahiran, legalisir akte kematian, legalisir akte
                        perkawinan, legalisir akte cerai, legalisir buku nikah, legalisir surat perjanjian, legalisir surat
                        pengalaman kerja, legalisir surat kuasa, legalisir medical, legalisir kemenristek dikti dan lain
                        sebagainya.
                    </p>
                </div>
                <div class="flex flex-row flex-wrap justify-center items-start gap-4">
                    <div class="flex flex-col justify-center items-center gap-2 w-full md:w-96">
                        <div class="p-8 relative rounded-lg bg-white shadow-lg flex flex-col gap-4 h-full md:h-[33rem]">
                            <p class="text-sm text-gray-700">Untuk Pendidikan</p>
                            <p class="text-[#660066]"><span class="text-4xl">Legalisir</span> <span
                                    class="text-xl">Sekolah</span>
                            </p>
                            <p class="text-sm text-gray-700">Legalisir Online</p>
                            <p class="text-lg text-gray-700">Sekolah</p>

                            <div class="flex flex-col text-gray-800">
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Menyiapkan file scan dokumen legalisir (Ijazah dan atau Transkrip Nilai
                                        asli)</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Membuat Surat Pernyataan Keaslian Berkas, dengan materai 10.000.</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Mengisi Tracer Studi</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Melakukan pembayaran melalui Transfer, Dompet Digital, atau QRIS</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Cek Metode Pengiriman Dokumen</span>
                                </div>
                            </div>
                            <div class="absolute bottom-8 left-8">
                                <a href="/order/create"
                                    class="btn normal-case btn-primary w-max mx-auto md:mx-0 btn-sm text-lg">Pesan
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-2 w-full md:w-96">
                        <div class="p-8 relative rounded-lg bg-white shadow-lg flex flex-col gap-4 h-full md:h-[33rem]">
                            <p class="text-sm text-gray-700">Untuk Pemerintahan</p>
                            <p class="text-[#660066]"><span class="text-4xl">Legalisir</span> <span
                                    class="text-xl">Dinas</span>
                            </p>
                            <p class="text-sm text-gray-700">Legalisir Online</p>
                            <p class="text-lg text-gray-700">Dinas</p>

                            <div class="flex flex-col text-gray-800">
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Penduduk mengajukan berkas kepada petugas</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Berkas diverifikasi dan distempel legalisir</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Kabid/ Kasi menandatangani berkas</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Penyerahan berkas legalisir kepada pemohon</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Melakukan pembayaran melalui Transfer, Dompet Digital, atau QRIS</span>
                                </div>
                                <div class="flex flex-row gap-4 items-center">
                                    <i class="fas fa-check text-[#660066]"></i>
                                    <span>Cek Metode Pengiriman Dokumen</span>
                                </div>
                            </div>
                            <div class="absolute bottom-8 left-8">
                                <a href="/order/create"
                                    class="btn normal-case btn-primary w-max mx-auto md:mx-0 btn-sm text-lg">Pesan
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col-reverse md:flex-row md:justify-between items-center px-4 md:px-16 py-16">
            <div class="flex flex-col gap-4">
                <p class="text-xl md:text-4xl font-bold font-[Quicksand] text-gray-900">Lebih dari 350+ dokumen legalisir
                    terkirim dengan aman, dan terus bertambah</p>
                <div class="flex flex-col justify-start items-start gap-4">
                    <div class="flex flex-col justify-start items-start gap-1">
                        <label>Dokumen Berhasil</label>
                        <div class="bg-gray-200 w-80 rounded-full dark:bg-gray-700">
                            <div class="bg-[#660066] text-xs font-medium text-gray-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 90%"> 90%</div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-1">
                        <label>Legalisir Ijazah</label>
                        <div class="bg-gray-200 w-80 rounded-full dark:bg-gray-700">
                            <div class="bg-[#660066] text-xs font-medium text-gray-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 80%"> 80%</div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-1">
                        <label>Legalisir Kedinasan</label>
                        <div class="bg-gray-200 w-80 rounded-full dark:bg-gray-700">
                            <div class="bg-[#660066] text-xs font-medium text-gray-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 60%"> 60%</div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-1">
                        <label>Kepuasan Pelanggan</label>
                        <div class="bg-gray-200 w-80 rounded-full dark:bg-gray-700">
                            <div class="bg-[#660066] text-xs font-medium text-gray-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 82%"> 82%</div>
                        </div>
                    </div>
                </div>

            </div>
            <img src="/image/Pilihan-Tepat.png" alt="" class="w-[32rem]">
        </div>
        <div class="px-4 md:px-16 pt-16 py-4 bg-[#660066]">
            <div class="flex flex-col md:flex-row md:justify-around items-start">
                <div class="flex flex-col gap-4">
                    <img src="/image/Footer-Logo-Daya-Bimantara.png" alt="" class="w-56 rounded-lg">
                    <div class="text-gray-200">
                        <p>Perumahan Taman Puri Banjaran Blok C2 RT 01 RW 18</p>
                        <p>Kelurahan Bringin, Kecamatan Ngaliyan</p>
                        <p>Kota Semarang Ngaliyan Kota Semarang Jawa Tengah 50189</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4 items-center justify-center">
                    <p class="text-gray-100 font-semibold">Navigasi</p>
                    <div class="flex flex-row gap-4 items-start text-gray-200">
                        <a href="/">Home</a>
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                    </div>
                </div>

            </div>
            <div class="border-t-2 pt-2 mt-4">
                <p class="text-gray-100 text-center">Copyright © <?= now()->year ?> - CV Daya Bimantara</p>
            </div>
        </div>
    </div>
@endsection
