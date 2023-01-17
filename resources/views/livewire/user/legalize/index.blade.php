@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @if ($data['legalize'])
            <div class="flex justify-between">
                <a href="/legalize/{{ $data['legalize']->id }}/edit" class="mb-2 normal-case btn btn-primary btn-sm">Edit
                    Data</a>
                <p class="text-sm">Ditambahkan pada: {{ date('d-m-Y', strtotime($data['legalize']->updated_at)) }}</p>
            </div>
        @else
            <a href="/legalize/create" class="mb-2 normal-case btn btn-primary btn-sm">Tambah Data</a>
        @endif
        <ul class="flex flex-col flex-wrap pl-0 mb-4 list-none border-b-2 shadow-sm nav nav-tabs nav-justified md:flex-row"
            id="tabs-tabJustify" role="tablist">
            <li class="flex-grow text-center nav-item" role="presentation">
                <a href="#ijazah"
                    class="block w-full px-6 py-3 font-medium leading-tight normal-case border-t-0 border-b-2 border-transparent nav-link border-x-0 hover:border-transparent hover:bg-gray-100 focus:border-transparent active"
                    id="tabs-home-tabJustify" data-bs-toggle="pill" data-bs-target="#ijazah" role="tab"
                    aria-controls="ijazah" aria-selected="true">Ijazah</a>
            </li>
            <li class="flex-grow text-center nav-item" role="presentation">
                <a href="#transkrip-nilai"
                    class="block w-full px-6 py-3 font-medium leading-tight normal-case border-t-0 border-b-2 border-transparent nav-link border-x-0 hover:border-transparent hover:bg-gray-100 focus:border-transparent"
                    id="tabs-profile-tabJustify" data-bs-toggle="pill" data-bs-target="#transkrip-nilai" role="tab"
                    aria-controls="transkrip-nilai" aria-selected="false">Transkrip Nilai</a>
            </li>
        </ul>
        <div class="tab-content" id="tabs-tabContentJustify">
            <div class="tab-pane fade show active md:max-h-[65vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin"
                id="ijazah" role="tabpanel" aria-labelledby="tabs-home-tabJustify">
                @if ($data['legalize'])
                    <img src="{{ $data['legalize']->ijazah }}" width="400px" class="mx-auto border shadow-lg"
                        alt="">
                @else
                    <p>Belum ada data yang ditambahkan</p>
                @endif
            </div>
            <div class="tab-pane fade md:max-h-[65vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin"
                id="transkrip-nilai" role="tabpanel" aria-labelledby="tabs-profile-tabJustify">
                @if ($data['legalize'])
                    <img src="{{ $data['legalize']->transkrip }}" width="400px" class="mx-auto border shadow-lg"
                        alt="">
                @else
                    <p>Belum ada data yang ditambahkan</p>
                @endif
            </div>
        </div>
    </x-navigation>
@endsection
