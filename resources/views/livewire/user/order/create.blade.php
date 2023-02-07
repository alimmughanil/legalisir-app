<div class="grid w-full grid-cols-1 gap-2 justify-items-center my-4 sm:my-0">
    <div class="max-w-sm overflow-auto sm:max-w-full scrollbar-none">
        <div class="flex flex-col max-w-full gap-2 md:flex-row">
            <button wire:loading.attr="disabled" type="button"
                class="btn normal-case {{ $active == 1 ? '' : 'btn-outline' }}" wire:click="$set('active',1)">1. Data
                Pemesan</button>
            <button wire:loading.attr="disabled" type="button"
                class="btn normal-case {{ $active == 2 ? '' : 'btn-outline' }}" wire:click="$set('active',2)">2. Data
                Dokumen</button>
            <button wire:loading.attr="disabled" type="button" {{ $document_price < 10000 ? 'disabled' : '' }}
                class="btn normal-case {{ $active == 3 ? '' : 'btn-outline' }}" wire:click="$set('active',3)">3.
                Lanjutkan Pembayaran</button>
        </div>
    </div>
    @if ($errors->any())
        <div class="mt-4">
            <p>Form yang dikirimkan tidak lengkap</p>
            @foreach ($errors->all() as $error)
                <p class="text-sm text-red-500">* {{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div
        class="w-full p-4 border shadow my-2 sm:w-[32rem] max-h-full sm:max-h-[70vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
        <form wire:submit.prevent="store" class="mb-6">
            @if ($active == 1)
                <div class="">
                    {{ $this->orderForm }}
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-row gap-2 items-center mt-4">
                            <label class="text-sm font-medium">Alamat Pengiriman</label>
                            <button wire:loading.attr="disabled" type="button" wire:loading.attr='disabled'
                                wire:click="$toggle('addressEdit')"
                                class="btn btn-ghost btn-sm btn-circle {{ !$address ? 'hidden' : '' }}">
                                <i class="fas {{ $addressEdit ? 'fa-xmark' : 'fa-edit' }}"></i>
                            </button>
                        </div>
                        @if ($address && !$addressEdit)
                            <p class="text-sm">{{ $address }}, {{ $city }}, {{ $province }}
                                {{ $postcode }}</p>
                        @endif
                        @if (!$address || $addressEdit)
                            <div class="border border-gray-200 p-4 rounded-lg flex flex-col gap-1 w-full">
                                <label class="text-sm">Provinsi</label>
                                <select class="select select-bordered mb-2 w-full" wire:loading.attr='disabled'
                                    wire:model="province_destination" name="province_destination" id="">
                                    <option value="" selected>Pilih Salah Satu Provinsi</option>
                                    @foreach ($provinceList as $value)
                                        <option value="{{ json_encode($value) }}">{{ $value['province'] }}</option>
                                    @endforeach
                                </select>
                                @if ($cityByProvince)
                                    <label class="text-sm">Kabupaten atau Kota</label>
                                    <select class="select select-bordered mb-2 w-full" wire:loading.attr='disabled'
                                        wire:model="city_destination" name="city_destination" id="">
                                        <option value="" selected>Pilih Salah Satu Kota atau Kabupaten</option>
                                        @foreach ($cityByProvince as $city)
                                            <option value="{{ json_encode($city) }}">{{ $city['type'] }}
                                                {{ $city['city_name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($city_destination)
                                        <label class="text-sm">Kode Pos</label>
                                        <input type="text" class="input input-bordered w-full mb-2"
                                            value="{{ $postcode }}" wire:model="postcode">
                                        <label class="text-sm">Alamat Rumah</label>
                                        <input type="text" class="input input-bordered w-full mb-2"
                                            value="{{ $address }}" wire:model="address">
                                    @endif
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex justify-end">
                    <button wire:loading.attr="disabled" type="button" wire:click="$set('active',2)"
                        class="mt-2 normal-case btn btn-sm btn-outline">Selanjutnya</button>
                </div>
            @endif
            @if ($active == 2)
                <div class="">
                    <p class="text-gray-500">Translasi Bahasa Indonesia</p>
                    <p class="text-gray-400 text-sm">Rp2000 perlembar</p>
                    <div class="grid grid-cols-1 my-4 mt-2 md:grid-cols-2">
                        <div
                            class="@error('ijazah_idn_qty') border border-red-500 @enderror flex items-center justify-between gap-2 px-4 rounded-lg shadow-sm bg-gray-50">
                            <label for="ijazah_idn_qty" class="">Ijazah</label>
                            <div class="flex items-center">
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('minus','ijazah_idn_qty')"><i
                                        class="fas text-sm fa-minus"></i></button>
                                <input
                                    class="w-12 items-center text-sm text-center border-none bg-inherit focus:outline-none focus:border-none focus:ring-0"
                                    wire:model="ijazah_idn_qty" type="text" name="ijazah_idn_qty"
                                    value="{{ $ijazah_idn_qty }}" id="ijazah_idn_qty" readonly>
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('plus','ijazah_idn_qty')"><i
                                        class="fas text-sm fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-2 px-2 rounded-lg shadow-sm bg-gray-50">
                            <label for="transkrip_idn_qty" class="">Transkrip Nilai</label>
                            <div class="flex items-center">
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('minus','transkrip_idn_qty')"><i
                                        class="fas text-sm fa-minus"></i></button>
                                <input
                                    class="w-12 text-sm text-center border-none bg-inherit focus:outline-none focus:border-none focus:ring-0"
                                    wire:model="transkrip_idn_qty" type="text" name="transkrip_idn_qty"
                                    value="{{ $transkrip_idn_qty }}" id="transkrip_idn_qty" readonly>
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('plus','transkrip_idn_qty')"><i
                                        class="fas text-sm fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    @error('ijazah_idn_qty')
                        <p class="text-sm text-danger-500">* {{ $message }}</p>
                    @enderror
                    <p class="text-gray-500">Translasi Bahasa Inggris</p>
                    <p class="text-gray-400 text-sm">Rp4000 perlembar</p>
                    <div class="grid grid-cols-1 my-4 mt-2 md:grid-cols-2">
                        <div class="flex items-center justify-between gap-2 px-4 bg-gray-50">
                            <label for="ijazah_eng_qty" class="">Ijazah</label>
                            <div class="flex items-center">
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('minus','ijazah_eng_qty')"><i
                                        class="fas text-sm fa-minus"></i></button>
                                <input
                                    class="w-12 text-sm text-center border-none bg-inherit focus:outline-none focus:border-none focus:ring-0"
                                    wire:model="ijazah_eng_qty" type="text" name="ijazah_eng_qty"
                                    value="{{ $ijazah_eng_qty }}" id="ijazah_eng_qty" readonly>
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('plus','ijazah_eng_qty')"><i
                                        class="fas text-sm fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-2 px-2 bg-gray-50">
                            <label for="transkrip_eng_qty" class="">Transkrip Nilai</label>
                            <div class="flex items-center">
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('minus','transkrip_eng_qty')"><i
                                        class="fas text-sm fa-minus"></i></button>
                                <input
                                    class="w-12 text-sm text-center border-none bg-inherit focus:outline-none focus:border-none focus:ring-0"
                                    wire:model="transkrip_eng_qty" type="text" name="transkrip_eng_qty"
                                    value="{{ $transkrip_eng_qty }}" id="transkrip_eng_qty" readonly>
                                <button wire:loading.attr="disabled" type="button"
                                    class="btn btn-ghost btn-circle btn-xs"
                                    wire:click="setQty('plus','transkrip_eng_qty')"><i
                                        class="fas text-sm fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <p class="text-gray-700 text-end">Total Harga</p>
                        <p class="text-gray-800 text-end font-bold">
                            Rp{{ number_format($document_price, 0, ',', '.') }}
                        </p>
                        <div class="text-red-400 text-xs"> <i class="fas fa-circle-info"></i> Total minimal transaksi
                            adalah Rp10.000</div>
                    </div>

                    <div class="flex flex-row justify-between">
                        <button wire:loading.attr="disabled" type="button" wire:click="$set('active',1)"
                            class="mt-2 normal-case btn btn-sm">Sebelumnya</button>
                        <button wire:loading.attr="disabled" type="button" wire:click="$set('active',3)"
                            {{ $document_price < 10000 ? 'disabled' : '' }}
                            class="mt-2 normal-case btn btn-sm btn-outline">Selanjutnya</button>
                    </div>
                </div>
            @endif
            @if ($active == 3)
                <div class="">
                    <p class="text-gray-500">Pilih Jasa Kurir</p>
                    <select class="select select-bordered mb-2 w-full" wire:loading.attr='disabled'
                        wire:model="courier_type" name="courier_type" id="">
                        <option value="" selected>Pilih Salah Satu Jasa Kurir</option>
                        @foreach ($courierTypeList as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @if ($courierServiceList)
                        <p class="text-gray-500">Pilih Layanan Pengantaran</p>
                        <select class="select select-bordered mb-2 w-full" wire:loading.attr='disabled'
                            wire:model="courier_service" name="courier_service" id="">
                            <option value="" selected>Pilih Salah Satu Layanan</option>
                            @foreach ($courierServiceList as $courier)
                                <option value="{{ json_encode($courier) }}">
                                    {{ $courier['service'] }} ({{ $courier['cost'][0]['etd'] }}
                                    {{ $courier_type == 'POS' ? '' : 'Hari' }}) -
                                    Rp{{ number_format($courier['cost'][0]['value'], 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    @endif
                    <p class="text-gray-500">Pilih Metode Pembayaran</p>
                    <div class="grid grid-cols-1 my-4 mt-2 md:grid-cols-2">
                        <ul class="flex flex-col md:flex-row md:flex-wrap ">
                            <li class="@error('ijazah_idn_qty') border border-red-500 rounded-lg @enderror">
                                <input type="radio" id="auto" name="payment_method" value="auto"
                                    {{ $payment_method == 'auto' ? 'checked' : '' }} class="hidden peer">
                                <label for="auto"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block w-full">
                                        <div class="w-full text-lg font-semibold">Bank Virtual Account</div>
                                        <div class="flex flex-row gap-2">
                                            <img class="w-10"
                                                src="https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg"
                                                alt="">
                                            <img class="w-10"
                                                src="https://upload.wikimedia.org/wikipedia/commons/2/2e/BRI_2020.svg"
                                                alt="">
                                            <img class="w-10"
                                                src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg"
                                                alt="">
                                            <img class="w-10"
                                                src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg"
                                                alt="">
                                        </div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                    @error('payment_method')
                        <p class="text-sm text-danger-500">* {{ $message }}</p>
                    @enderror

                    <div class="flex flex-row items-end justify-between my-4">
                        <div class="flex flex-col text-[0.8rem]">
                            <p>Biaya Legalisir : <span
                                    class="font-medium">Rp{{ number_format($document_price, 0, ',', '.') }}</span>
                            </p>
                            <p>Biaya Ongkir : <span
                                    class="font-medium">Rp{{ number_format($courier_price, 0, ',', '.') }}</span></p>
                        </div>
                        <div class="">
                            <p class="text-gray-700 text-end">Total Pembayaran</p>
                            <p class="text-gray-800 text-end font-bold">
                                Rp{{ number_format($price_amount, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between">
                        <button wire:loading.attr="disabled" type="button" wire:click="$set('active',2)"
                            class="float-left mt-4 normal-case btn btn-sm">Sebelumnya</button>
                        <button {{ !$courier_price ? 'disabled' : '' }} type="submit"
                            class="float-right mt-4 normal-case btn btn-sm btn-outline">Lanjutkan
                            Pembayaran</button>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
