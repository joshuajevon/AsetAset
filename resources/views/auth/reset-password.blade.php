@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <x-navigation-bar page="login" />

    <section class="c-container pt-28 sm:pt-32 md:pt-36 lg:pt-40 xl:pt-44 2xl:pt-48 pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <x-page-title title="Pulihkan Akun" />

        <form method="POST" action="{{ route('password.store') }}" class="bg-cWhite py-4 sm:py-6 md:py-8 lg:py-10 xl:py-14 2xl:py-16 px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 2xl:px-16 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="w-full px-4 mt-2">
                <x-input-label for="email-login" :value="__('Alamat Email')" />
                <x-text-input autocomplete="false" placeholder="Masukkan alamat email" id="email-login" class="mt-1 w-full"
                    type="text" name="email" :value="old('email', $request->email)" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="px-4 w-full grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 md:gap-10 lg:gap-12 xl:gap-14 2xl:gap-16 mt-2">
                <div class="col-span-1 flex flex-col justify-start items-start gap-6">
                    {{-- Password --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="password-register" :value="__('Password')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Terdiri dari 8 karakter, mengandung huruf besar, huruf kecil, dan angka"
                            id="password-register" class="mt-1 w-full" type="password" name="password" value="{{old('password')}}" autocomplete="new-password"/>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-span-1 flex flex-col justify-start items-start gap-6">
                    {{-- Ulangi Password --}}
                    <div class="w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="ulangi-password-register" :value="__('Ulangi Password')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Ulangi penulisan password dan pastikan tidak ada salah ketik"
                            id="ulangi-password-register" class="mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" value="{{old('password_confirmation')}}" />
                        @error('password_confirmation')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="px-4 self-end">
                <p class="text-red-500 text-sm sm:text-base lg:text-lg">*Wajib diisi</p>
            </div>

            <div class="px-4">
                <x-primary-button>
                    {{ __('Pulihkan Akun Saya') }}
                </x-primary-button>
            </div>
            <div class="px-4 flex flex-col items-start justify-center text-base gap-4">
                <span class="" href="/register">
                    Belum punya akun? <a href="/register" class="font-bold underline">Daftar di sini</a>
                </span>
            </div>
        </form>
    </section>
@endsection
