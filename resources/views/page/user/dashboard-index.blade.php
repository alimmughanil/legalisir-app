@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.dashboard.index', $data)
    </x-navigation>
@endsection
