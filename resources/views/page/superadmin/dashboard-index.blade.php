@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="Super Admin">
        <livewire:super-admin.dashboard.index />
    </x-navigation>
@endsection
