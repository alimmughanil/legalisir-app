@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        @livewire('user.order.show', $data)
    </x-navigation>
@endsection
