@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="hubungi-kami" />

    {{-- Search Bar --}}
    <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section>

    <section
        class="c-container bg-cLightGrey bg-cover bg-center bg-[url('/public/assets/hubungi-kami/hubungi-kami-bg.png')] py-6 sm:py-8 md:py-10 lg:py-12 xl:py-14 2xl:py-16 flex justify-center items-center">
        <div
            class="flex flex-col justify-center items-center h-[200px] sm:h-[250px] md:h-[300px] lg:h-[350px] xl:h-[400px] gap-2">
            <h2 class="text-cGold font-medium text-base sm:text-xl lg:text-2xl text-center">asetaset.com</h2>
            <h1
                class="font-extrabold text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl text-cWhite text-center">
                Tim AsetAset Siap Membantu Anda</h1>
        </div>
    </section>

    <section class="c-container py-8 lg:py-16 xl:py-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        {{-- Title --}}
        <x-page-title title="Hubungi Kami" />

        <div class="grid grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
            <div class="col-span-1">

            </div>

            <div class="col-span-1">
                <form id="form-hubungi-kami" method="POST" action="{{route('contact')}}"
                    class="bg-cWhite py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32 px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 2xl:px-16 flex flex-col justify-center items-start gap-6"
                    onsubmit="submitLoginForm(event)">
                    @csrf
                    <div class="w-full flex flex-col justify-center items-start gap-4 px-4 pb-5 border-b-2 border-b-cGold">
                        <h2 class="text-cGold font-medium text-base sm:text-xl lg:text-2xl text-center">asetaset.com</h2>
                        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-medium">Jangan Ragu Untuk Menghubungi Kami</span>
                        </h1>
                        <p class="text-base sm:text-lg">Silahkan isi data diri anda, dan tim kami akan segera menghubungi untuk membantu anda</span>.
                        </p>
                    </div>

                    {{-- Nama --}}
                    <div class="px-4 w-full pt-6">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="nama-hubungi-kami" :value="__('Nama')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Nama Anda"
                            id="nama-hubungi-kami" class="mt-1 w-full" type="text" name="name" />
                        @error('name')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alamat Email --}}
                    <div class="px-4 w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="email-hubungi-kami" :value="__('Alamat Email')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="contoh@gmail.com" id="email-hubungi-kami"
                            class="mt-1 w-full" type="text" name="email" />
                        @error('email')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div class="px-4 w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="subjek-hubungi-kami" :value="__('Subjek')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false"
                            placeholder="Judul Pesan Anda"
                            id="subjek-hubungi-kami" class="mt-1 w-full" type="text" name="subject" />
                        @error('subject')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pesan --}}
                    <div class="px-4 w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="pesan-hubungi-kami" :value="__('Pesan')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <textarea name="mail" placeholder="Isi Pesan Anda" class="w-full mt-1 resize-none p-4 border border-cDarkGrey rounded-md text-sm sm:text-base bg-cWhite autofill:shadow-[inset_0_0_0px_1000px_rgb(255,255,255)]"  id="pesan-hubungi-kami" rows="8">

                        </textarea>
                        @error('message')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Error Message --}}
                    {{-- <div class="px-4">
                        <p id="error-message-login" class="text-base text-red-600"></p>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div> --}}


                    <div class="px-4">
                        <button type="submit" class="gold-btn px-12">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
