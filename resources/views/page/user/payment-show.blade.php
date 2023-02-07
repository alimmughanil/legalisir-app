@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation role="User">
        <livewire:user.payment.show :payment="$data['payment']" />
    </x-navigation>
@endsection
