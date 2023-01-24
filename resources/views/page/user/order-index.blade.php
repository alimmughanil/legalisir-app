@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="User">
        <livewire:user.order.index />
    </x-navigation>
@endsection
