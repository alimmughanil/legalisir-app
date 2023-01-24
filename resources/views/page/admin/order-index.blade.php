@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="User">
        <livewire:admin.order.index />
    </x-navigation>
@endsection
