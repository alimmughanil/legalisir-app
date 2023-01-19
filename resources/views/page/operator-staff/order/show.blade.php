@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        <x-table />
    </x-navigation>
@endsection