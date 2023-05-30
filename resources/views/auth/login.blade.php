@extends('template.template')

@section('head')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}?t={{ env('VERSION_TIME') }}">

    <!-- javascript -->
@endsection

@section('body')
    <x-navigation-bar page="login" />

    {{-- Title --}}
    <section class="c-container pt-48 pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <x-page-title title="Login Pengguna" />


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form id="form-login" method="POST" action="{{ route('login') }}"
            class="bg-cWhite py-32 px-16 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6" onsubmit="submitLoginForm(event)">
            @csrf
            <div class="w-full border-b-2 border-b-cGold px-4 pb-5">
                <h1 class="text-7xl">Bergabunglah dengan <span class="text-cGold">asetaset.com</span></h1>
            </div>

            <!-- Email Address -->
            <div class="w-full px-4">
                <x-input-label for="email-login" :value="__('Alamat Email')" />
                <x-text-input autocomplete="false" placeholder="Masukkan alamat email" id="email-login"
                    class="mt-1 w-full" type="text" name="email" :value="old('email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="w-full px-4">
                <x-input-label for="password-login" :value="__('Password')" />

                <x-text-input id="password-login" class="mt-1 w-full" type="password" name="password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block px-4">
                <label for="remember-me-login" class="inline-flex items-center">
                    <input id="remember-me-login" type="checkbox"
                        class="rounded-sm border-cDarkGrey appearance-none text-cGold focus:ring-0 focus:ring-offset-0 w-5 h-5"
                        name="remember">
                    <span class="ml-2 text-base text-cBlack">{{ __('Remember me') }}</span>
                </label>
            </div>

            {{-- Error Message --}}
            <div class="px-4">
                <p id="error-message-login" class="text-base text-red-600"></p>
            </div>

            <div class="px-4">
                <x-primary-button>
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>

            <div class="px-4 flex flex-col items-start justify-center text-base gap-4">
                @if (Route::has('password.request'))
                    <a class=""
                        href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
                <span class=""
                    href="/register">
                    Belum punya akun? <a href="/register" class="font-bold underline">Daftar di sini</a>
                </span>
            </div>
        </form>
    </section>

    {{-- Scripts --}}
    <script src="{{ asset('js/login.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
