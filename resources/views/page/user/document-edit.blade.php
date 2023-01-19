@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.document.edit', $data)
    </x-navigation>
@endsection
