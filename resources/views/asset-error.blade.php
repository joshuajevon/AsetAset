@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/asset-by-id.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="beranda" />

    {{-- Search Bar --}}
    <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section>

    {{-- Asets --}}
    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        {{-- Title --}}
        <x-page-title title="Gagal Beli Aset" />

        <div class="grid grid-cols-3 xl:grid-cols-4 gap-8">
            {{-- Filter --}}
            <div class="hidden xl:flex flex-col bg-cWhite grow col-span-1 h-fit rounded-lg">
            </div>

            {{-- Aset galeri --}}
            <div class="flex flex-col gap-8 col-span-3">
                <div class="p-4 sm:p-6 lg:p-8 text-red-700 bg-red-200 rounded-lg font-bold">
                    <p>
                        Anda diharuskan login terlebih dahulu untuk membeli aset ini. <a href="/login"
                            class="underline text-blue-500">Klik disini</a> untuk login atau <a href="/register"
                            class="underline text-blue-500">Klik disini</a> untuk mendaftar.</p>
                </div>

                <a href="{{ asset('assets/panduan/Panduan Cara Membuat Akun.pdf') }}?t={{ env('VERSION_TIME') }}"
                    target="_blank" rel="noopener noreferrer" class="gold-btn gap-2 w-fit self-end">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Unduh Panduan
                </a>
            </div>
        </div>
    </section>

    <section class="bg-cover bg-center"
        style="background-image: url('{{ asset('assets/tentang-kami/tentang-kami-bg-2.png') }}')">
        <div
            class="c-container py-6 sm:py-8 md:py-10 lg:py-12 xl:py-14 2xl:py-16  flex flex-col justify-center items-start h-[200px] sm:h-[250px] md:h-[300px] lg:h-[350px] xl:h-[400px] gap-2 sm:gap-4 lg:gap-6">
            <img class="w-28 sm:w-32 md:w-36 lg:w-40 xl:w-44 2xl:w-48" src="{{ asset('assets/logo/asetaset-full.png') }}"
                alt="logo">
            <h1 class="font-medium text-2xl sm:text-3xl lg:text-4xl text-cBlack">Butuh Bantuan?</h1>
            {{-- <h2 class="hidden xl:block text-xl sm:text-2xl lg:text-3xl text-cBlack">Jangan Ragu Untuk Menghubungi Kami</h2> --}}
            <a class="gold-btn group relative inline-flex items-center overflow-hidden px-10 focus:outline-none text-base sm:text-lg lg:text-xl"
                href="/hubungi-kami">
                <span class="absolute -end-full transition-all group-hover:end-4">
                    <svg class="h-4 sm:h-5 lg:h-6 aspect-square rtl:rotate-180" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </span>

                <span class="transition-all group-hover:me-4">
                    Hubungi Kami
                </span>
            </a>
        </div>
    </section>
@endsection
