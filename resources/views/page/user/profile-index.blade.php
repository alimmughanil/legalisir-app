@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.profile.index', $data)
    </x-navigation>
@endsection
