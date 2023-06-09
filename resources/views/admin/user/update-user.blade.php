@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-users" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('user') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit User</h1>

            <form action="{{ route('update-user', $user->id) }}" method="POST" enctype="multipart/form-data"
                class="w-full bg-cWhite p-8 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6">
                @csrf
                @method('patch')
                <div class="w-full">
                    <x-input-label for="user-name" :value="__('Nama')" />
                    <x-text-input type="text" id="user-name" class="mt-1 w-full" placeholder="Masukkan nama user" name="name"
                        value="{{ $user->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="user-nickname" :value="__('Nama Panggilan')" />
                    <x-text-input type="text" id="user-nickname" class="mt-1 w-full" placeholder="Masukkan nama panggilan user"
                        name="nickname" value="{{ $user->nickname }}" />
                    <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="user-email" :value="__('Alamat Email')" />
                    <x-text-input type="text" id="user-email" class="mt-1 w-full" placeholder="Masukkan alamat email user"
                        name="email" value="{{ $user->email }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="user-phone-number" :value="__('Nomor Handphone')" />
                    <x-text-input type="text" id="user-phone-number" class="mt-1 w-full" placeholder="Masukkan nomer handphone user"
                        name="phone_number" value="{{ $user->phone_number }}" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="user-jenis-kelamin" :value="__('Jenis Kelamin')" />

                    <div class="mt-1 w-full flex justify-start items-center gap-8 text-sm sm:text-base">
                        <div class="mt-1 w-full flex justify-start items-center gap-8 text-sm sm:text-base">
                            <div class="flex justify-center items-center gap-2">
                                <input class="cursor-pointer rounded-full appearance-none text-cGold focus:ring-0 focus:ring-offset-0" type="radio" id="laki-laki" name="gender" value="Laki-laki"
                                    @if ($user->gender == 'Laki-laki') checked="checked" @endif>
                                <label for="laki-laki">Laki-laki</label>
                            </div>

                            <div class="flex justify-center items-center gap-2">
                                <input class="cursor-pointer rounded-full appearance-none text-cGold focus:ring-0 focus:ring-offset-0" type="radio" id="perempuan" name="gender" value="Perempuan"
                                    @if ($user->gender == 'Perempuan') checked="checked" @endif>
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>
                <button type="submit" class="gold-btn px-12">Simpan</button>
            </form>

        </div>
    </div>
@endsection
