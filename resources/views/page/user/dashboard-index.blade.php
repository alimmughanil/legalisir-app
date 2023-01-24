@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="User">
        <livewire:user.dashboard.index />
    </x-navigation>
@endsection
