@extends('layouts.app')
@section('title', $data['title'])

@section('content')
    <x-navigation>
        <div class="flex justify-center w-full my-0 md:my-4">
            <form action="/legalize/{{ $data['legalize']->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col justify-center w-full gap-8 px-4 py-8 border shadow-md md:w-96">
                    <div>
                        <x-utils.form.input label="Ijazah" id="ijazah" type="file" name="ijazah" :value="old('ijazah')"
                            autofocus />
                        <x-partials.input-error :messages="$errors->get('ijazah')" />
                    </div>
                    <div>
                        <x-utils.form.input label="Transkrip Nilai" id="transkrip" type="file" name="transkrip"
                            :value="old('transkrip')" autofocus />
                        <x-partials.input-error :messages="$errors->get('transkrip')" />
                    </div>
                    <button type="submit" class="w-full mt-2 normal-case btn-sm btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </x-navigation>
@endsection
