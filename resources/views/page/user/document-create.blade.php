@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="User">
        <livewire:user.document.create />
    </x-navigation>
@endsection
