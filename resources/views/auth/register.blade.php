@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <x-navigation-bar page="register" />

    <section
        class="c-container pt-28 sm:pt-32 md:pt-36 lg:pt-40 xl:pt-44 2xl:pt-48 pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <x-page-title title="Pendaftaran Pengguna Baru" />

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form action="{{ route('register') }}" id="form-login" method="POST"
        class="bg-cWhite py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32 px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 2xl:px-16 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6"
            onsubmit="submitLoginForm(event)">
            @csrf
            <div class="w-full flex flex-col justify-center items-start gap-4 border-b-2 border-b-cGold px-4 pb-5">
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl">Daftarkan Diri Anda di
                    <span class="text-cGold">asetaset.com</span>
                </h1>
                <p class="text-base sm:text-lg">Silakan lengkapi form pendaftaran berikut. Akun pengguna yang didaftarkan
                    <span class="font-bold underline">harus atas nama perorangan</span>.
                </p>
            </div>

            <div class="px-4 w-full grid grid-cols-2 gap-16">
                <div class="col-span-1 flex flex-col justify-start items-start gap-6">
                    {{-- Nama Lengkap --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="nama-lengkap-register" :value="__('Nama Lengkap')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Masukkan nama Anda sesuai yang tertera pada KTP (Tanpa Gelar)"
                            id="nama-lengkap-register" class="mt-1 w-full" type="text" name="name" value="{{old('name')}}" />
                        @error('name')
                            <div class="alert alert-danger" style="color: red" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alamat Email --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="email-register" :value="__('Alamat Email')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Masukkan alamat email yang valid dan dapat dihubungi" id="email-register"
                            class="mt-1 w-full" type="text" name="email" value="{{old('email')}}"/>
                        @error('email')
                            <div class="alert alert-danger" style="color: red" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="password-register" :value="__('Password')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Terdiri dari 8 karakter, mengandung huruf besar, huruf kecil, dan angka"
                            id="password-register" class="mt-1 w-full" type="password" name="password" value="{{old('password')}}"/>
                        @error('password')
                            <div class="alert alert-danger" style="color: red" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="jenis-kelamin-register" :value="__('Jenis Kelamin')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <div class="mt-1 w-full flex justify-start items-center gap-8 text-sm sm:text-base">
                            <div class="flex justify-center items-center gap-2">
                                <input type="radio" id="laki-laki" name="gender" value="Laki-laki" @if (old('gender') == "Laki-laki") checked="checked" @endif>
                                <label for="laki-laki">Laki-laki</label>
                            </div>

                            <div class="flex justify-center items-center gap-2">
                                <input type="radio" id="laki-perempuan" name="gender" value="Perempuan" @if (old('gender') == "Perempuan") checked="checked" @endif>
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="alert alert-danger" style="color: red" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-1 flex flex-col justify-start items-start gap-6">
                    {{-- Nama Panggilan --}}
                     <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="nama-panggilan-register" :value="__('Nama Panggilan')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false" placeholder="Masukkan nama panggilan Anda"
                            id="nama-panggilan-register" class="mt-1 w-full" type="text" name="nickname" value="{{old('nickname')}}"/>
                        @error('nickname')
                            <div class="alert alert-danger" style="color: red" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Nomer Handphone --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="nomer-handphone-register" :value="__('Nomer Handphone')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Pastikan nomor handphone Anda aktif dan dapat dihubungi"
                            id="nomer-handphone-register" class="mt-1 w-full" type="text" name="phone_number" value="{{old('phone_number')}}"/>
                        @error('phone_number')
                            <div class="alert alert-danger" style="color: red" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Ulangi Password --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="ulangi-password-register" :value="__('Ulangi Password')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Ulangi penulisan password dan pastikan tidak ada salah ketik"
                            id="ulangi-password-register" class="mt-1 w-full" type="password" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                        @error('password_confirmation')
                            <div class="alert alert-danger" style="color: red" role="alert">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="px-4 self-end">
                <p class="text-red-500 text-base sm:text-lg">*Wajib diisi</p>
            </div>

            {{-- Error Message --}}
             {{-- <div class="px-4">
                <p id="error-message-login" class="text-base text-red-600"></p>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                <x-input-error :messages="$errors->get('nickname')" class="mt-2" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div> --}}

            <div class="px-4">
                <p class="text-sm sm:text-base">Dengan menekan tombol Daftar, anda sudah bersedia dan menyetujui <a href="#"
                        class="font-bold underline">syarat dan ketentuan</a></p>
            </div>

            <div class="px-4">
                <x-primary-button>
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>
            </form>
        </div>
    </section>
@endsection
