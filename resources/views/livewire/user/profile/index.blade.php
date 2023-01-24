<div
    class="max-h-[80vh] overflow-auto scrollbar-thumb-gray-300 scrollbar-rounded-[50%] scrollbar-track-gray-100 scrollbar-thin">
    <div class="flex justify-center w-full gap-4">
        <div class="card w-[21rem] md:w-[60vh] lg:w-[100vh] border my-4 lg:my-0">
            <div class="py-4 card-body gap-y-4">
                <div class="{{ $isEdit == 'password' ? 'hidden' : 'w-full flex flex-col gap-4' }}">
                    <div class="flex flex-col items-center justify-center w-full gap-2">
                        <figure class="relative">
                            <div class="avatar">
                                <div class="w-24 border rounded-full">
                                    <img src="{{ $profile->photo }}" alt="Profile Photo" />
                                </div>
                            </div>
                            <button class="absolute top-0 right-0 outline-none" wire:loading.class="animate-pulse">
                                <i wire:click="$set('isEdit', 'photo')"
                                    class="{{ $isEdit == 'photo' ? 'hidden' : 'text-xl text-gray-700 fas fa-edit' }}"></i>
                                <i wire:click="$set('isEdit',null)"
                                    class="{{ $isEdit == 'photo' ? 'text-2xl text-gray-700 fas fa-xmark-circle' : 'hidden' }}"></i>
                            </button>
                        </figure>
                        <form wire:submit.prevent="updatePhoto"
                            class="{{ $isEdit == 'photo' ? 'w-full flex flex-col items-center justify-center gap-2' : 'hidden' }}">
                            {{ $this->photoForm }}
                            <button type="submit" class="btn btn-sm">
                                Simpan
                            </button>
                        </form>

                    </div>
                    <div class="flex flex-col justify-center w-full rounded-lg">
                        <div class="relative flex flex-col w-full gap-2 p-4 mx-auto border shadow md:w-80">
                            <button class="absolute outline-none top-2 right-2" wire:loading.class="animate-pulse">
                                <i wire:click="$set('isEdit', 'profile')"
                                    class="{{ $isEdit == 'profile' ? 'hidden' : 'text-xl text-gray-700 fas fa-edit' }}"></i>
                                <i wire:click="$set('isEdit',null)"
                                    class="{{ $isEdit == 'profile' ? 'text-2xl text-gray-700 fas fa-xmark-circle' : 'hidden' }}"></i>
                            </button>
                            <div class="{{ $isEdit == 'profile' ? 'hidden' : 'w-full flex flex-col gap-2' }}">
                                <div>
                                    <p class="font-medium origin-left">
                                        Nama Lengkap
                                    </p>
                                    <p class="overflow-auto text-sm text-left scrollbar-none">
                                        {{ $user->name }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium origin-left">
                                        Email
                                        <i
                                            class="{{ $user->email_verified_at ? 'fas mx-1 fa-check-circle' : 'hidden' }}"></i>
                                    </p>
                                    <p class="overflow-auto text-sm text-left scrollbar-none">
                                        {{ $user->email }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium origin-left ">
                                        Nomor Handphone
                                    </p>
                                    <p class="overflow-auto text-sm text-left scrollbar-none">
                                        {{ $profile->phone ? $profile->phone : 'Tidak Ada' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium origin-left ">
                                        Nama Sekolah
                                    </p>
                                    <p class="overflow-auto text-sm text-left scrollbar-none">
                                        {{ $school->school_name ? $school->school_name : 'Tidak Ada' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium origin-left ">
                                        Nomor Induk Siswa
                                    </p>
                                    <p class="overflow-auto text-sm text-left scrollbar-none">
                                        {{ $profile->student_id ? $profile->student_id : 'Tidak Ada' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium origin-left ">
                                        Tahun Lulus
                                    </p>
                                    <p class="overflow-auto text-sm text-left scrollbar-none">
                                        {{ $profile->graduated_at ? $profile->graduated_at : 'Tidak Ada' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="font-medium origin-left ">
                                        Alamat Rumah
                                    </p>
                                    <p class="overflow-auto text-sm text-left scrollbar-none">
                                        {{ $profile->address ? $profile->address . ', ' . $profile->city . ', ' . $profile->province . ' ' . $profile->postcode : 'Tidak Ada' }}
                                    </p>
                                </div>

                            </div>
                            <form wire:submit.prevent="updateProfile"
                                class="{{ $isEdit == 'profile' ? 'w-full flex flex-col items-center justify-center gap-2' : 'hidden' }}">
                                {{ $this->profileForm }}
                                <button type="submit" class="btn btn-sm">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="my-4 divider">
                        <button class="outline-none" wire:click="$set('isEdit', 'password')">Ganti Password</button>
                    </div>
                </div>
                <div
                    class="{{ $isEdit == 'password' ? 'w-full flex flex-col items-center justify-center gap-2' : 'hidden' }}">
                    <p class="text-lg font-semibold">Ganti Password</p>
                    <form wire:submit.prevent="updatePassword">
                        {{ $this->passwordForm }}
                        <div class="flex flex-row justify-center gap-4 mt-4">
                            <button type="submit" class="btn btn-sm">
                                Simpan
                            </button>
                            <button wire:click="$set('isEdit',null)" type="button" class="btn btn-sm btn-outline">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
