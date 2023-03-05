@extends('layouts.base')

@section('body')
    <section class="w-full min-h-screen bg-gray-200">
        <nav class="w-full gap-4 px-4 py-2 mx-auto font-medium text-gray-200 md:w-96 bg-[#660066]">
            <a href="/">
                <i class="text-lg fas fa-arrow-left"></i>
            </a>
            <span class="ml-2 text-lg">@yield('title')</span>
        </nav>
        <div class="p-6 mx-auto bg-white shadow-lg min-h-[93vh] md:w-96 grid grid-cols-1 items-center">
            @yield('content')
        </div>
    </section>
@endsection
