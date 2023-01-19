@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.document.show', $data)
    </x-navigation>
@endsection
