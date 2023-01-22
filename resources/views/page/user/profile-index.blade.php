@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        <livewire:user.profile.index />
    </x-navigation>
@endsection
