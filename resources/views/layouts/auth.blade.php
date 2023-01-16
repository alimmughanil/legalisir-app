@extends('layouts.base')

@section('body')
    <section class="h-full bg-gray-200 gradient-form md:h-screen">
        <div class="h-full px-6 py-12 mx-auto bg-white shadow-lg md:w-96">
            @yield('content')
        </div>
    </section>
@endsection
