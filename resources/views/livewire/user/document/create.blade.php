    <div
        class="max-h-[80vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
        <div class="flex justify-center w-full my-0 md:my-4">
            <form wire:submit.prevent="store">
                <div class="flex flex-col justify-center w-full gap-8 px-4 py-8 border shadow-md md:w-96">
                    @if (Session::has('message'))
                        <p class="p-4 text-sm text-gray-100 bg-red-600 rounded-md shadow-sm">
                            {{ Session::get('message') }}</p>
                    @endif
                    {{ $this->form }}
                    <a href="/storage/contoh-surat-pernyataan.pdf" class="-mt-10 text-sm cursor-pointer link-primary">
                        Download contoh surat pernyataan kepemilikan dokumen asli yang dibubuhi materai
                    </a>
                    <button type="submit" class="w-full mt-2 normal-case btn-sm btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
