@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="User">
        <livewire:user.order.show :order="$data['order']" />
    </x-navigation>
@endsection
