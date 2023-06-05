@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <x-navigation-bar page="login" />

    <section class="c-container pt-28 sm:pt-32 md:pt-36 lg:pt-40 xl:pt-44 2xl:pt-48 pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">

        <x-page-title title="Lupa Password" />
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form action="{{ route('password.email') }}" id="form-login" method="POST"
        class="bg-cWhite py-4 sm:py-6 md:py-8 lg:py-10 xl:py-14 2xl:py-16 px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 2xl:px-16 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6">
            @csrf

            <!-- Email Address -->
            <div class="w-full px-4 mt-2">
                <x-input-label for="email-login" :value="__('Alamat Email')" />
                <x-text-input autocomplete="false" placeholder="Masukkan alamat email" id="email-login" class="mt-1 w-full"
                    type="text" name="email" :value="old('email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
