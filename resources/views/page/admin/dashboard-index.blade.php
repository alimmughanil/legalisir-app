@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="Admin">
        <livewire:admin.dashboard.index />
    </x-navigation>
@endsection
