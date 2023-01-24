@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="User">
        <livewire:user.order.create />
    </x-navigation>
@endsection
