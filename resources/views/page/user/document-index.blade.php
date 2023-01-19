@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @if (isset($data['document']))
            <div class="flex flex-col justify-between mb-8 sm:flex-row">
                <a href="/document/{{ $data['document']->id }}/edit"
                    class="normal-case btn btn-primary btn-sm btn-outline">Edit
                    Data</a>
                <p class="text-sm font-medium">Update: {{ date('d-m-Y', strtotime($data['document']->updated_at)) }}</p>
            </div>
        @else
            <div class="flex justify-center mb-8">
                <a href="/document/create" class="normal-case btn btn-primary btn-sm btn-outline">Tambah Data</a>
            </div>
        @endif

        <livewire:user.document.index :document="$data['document']">
    </x-navigation>
@endsection
