@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="beranda" />

    {{-- Carousel Top --}}
    <section class="pt-20">
        <div id="top-splide" class="splide" role="group">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide" alt="">
                        <img class="w-full h-full object-contain"
                            src="https://images.unsplash.com/photo-1679678691328-54929d271c3f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxzZWFyY2h8MXx8bmF0dXJlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"
                            alt="">
                    </li>
                    <li class="splide__slide"><img class="w-full h-full object-contain"
                            src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1174&q=80"
                            alt=""></li>
                    <li class="splide__slide"><img class="w-full h-full object-contain"
                            src="https://images.unsplash.com/photo-1426604966848-d7adac402bff?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8bmF0dXJlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"
                            alt=""></li>
                </ul>
            </div>
        </div>
    </section>

    {{-- Asets --}}
    <section class="c-container py-8 lg:py-16 xl:py-32 flex flex-col gap-4 lg:gap-8 xl:gap-16">
        {{-- Title --}}
        <div class="flex justify-center items-center gap-8">
            <h1 class="text-4xl font-bold text-cGold">Galeri Aset</h1>
            <div class="flex-1 h-1 bg-cGold"></div>
        </div>

        {{-- Search Bar --}}
        <div class="self-center w-full max-w-[800px] ">
            <form class="w-full gap-2">
                <div class="py-3 px-6 flex rounded-full bg-cGold text-cWhite">
                    <input class="w-full bg-transparent border-none placeholder:text-cWhite text-base active:border-none active:outline-none" id="search" name="search" placeholder="Pencarian...">
                    <button type="button" class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>


        <div class="">
            {{ $assets->links() }}
        </div>

        {{-- Items --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @foreach ($assets as $asset)
                <a href="#"
                    class="group bg-cWhite border border-cDarkGrey p-2 sm:p-3 md:p-4 flex flex-col justify-center items-center gap-4">
                    <div class="relative aspect-square flex justify-center items-center border border-cDarkGrey">
                        <img src="{{ asset('/storage/asset/image/' . $asset->image) }}"
                            class="object-contain " alt="asset">
                    </div>

                    <div class="relative bg-white flex flex-col justify-center items-center gap-4">
                        <p class="text-base">{{ $asset->name }}</p>
                        <h3 class="text-xl text-cGold font-bold">
                            {{ $asset->price }}
                        </h3>
                        <div class="flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                            <p class="text-sm">{{ $asset->province }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>



    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/beranda.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
