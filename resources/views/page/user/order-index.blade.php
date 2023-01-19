@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.order.index', $data)
    </x-navigation>
@endsection
