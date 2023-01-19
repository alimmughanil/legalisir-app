@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.order.create', $data)
    </x-navigation>
@endsection
