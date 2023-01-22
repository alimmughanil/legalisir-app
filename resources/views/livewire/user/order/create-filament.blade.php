<div
    class="max-h-[80vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
    <div class="grid w-full grid-cols-1 gap-2 justify-items-center">
        <div class="w-full p-4 my-2 border shadow sm:w-[40rem]">
            <form wire:submit.prevent="store">
                {{ $this->form }}
            </form>
        </div>
    </div>

</div>
