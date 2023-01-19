@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.document.create', $data)
    </x-navigation>
@endsection
