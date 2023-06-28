@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="pengumuman" />

    {{-- Search Bar --}}
    <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section>

    {{-- Modal --}}
    <div id="modal-announcement"
        class="fixed top-0 left-0 z-50 c-container w-screen h-screen bg-cBlack/50 flex justify-center items-center hidden">
        <div class="bg-cWhite w-[1000px] h-fit max-h-[70%] rounded-lg flex flex-col">
            <div
                class="p-5 sm:p-6 md:p-7 lg:p-8 xl:p-9 2xl:p-10 bg-cDarkGrey rounded-t-lg flex justify-between items-center">
                <h1 class="font-bold text-center text-2xl">Pengumuman</h1>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-8 h-8 cursor-pointer" onclick="closeModal()">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="p-5 sm:p-6 md:p-7 lg:p-8 xl:p-9 2xl:p-10 flex flex-col gap-4 lg:gap-8 overflow-y-scroll h-full">
                <h2 id="announcement-date" class="text-sm lg:text-base opacity-75"></h2>
                <h1 id="announcement-title" class="text-2xl lg:text-3xl font-bold"></h1>
                <p id="announcement-desc" class="text-sm lg:text-lg"></p>
                <a id="announcement-download" href="" download class="gold-btn gap-2 w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    Unduh
                </a>
            </div>
        </div>
    </div>

    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <x-page-title title="Pengumuman" />

        {{-- Filters long --}}
        <div class="hidden lg:flex item-center gap-8 text-lg">
            <a href="{{ url('pengumuman') }}">
                <button
                    class="@if (request()->is('pengumuman')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    Semua Pengumuman
                </button>
            </a>
            <a href="{{ url('pengumuman/PKPU ') }}">
                <button
                    class="@if (request()->is('pengumuman/PKPU')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    Pengumuman PKPU
                </button>
            </a>
            <a href="{{ url('pengumuman/Pailit') }}">
                <button
                    class="@if (request()->is('pengumuman/Pailit')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    Pengumuman Pailit
                </button>
            </a>
            <a href="{{ url('pengumuman/Others') }}">
                <button
                    class="@if (request()->is('pengumuman/Others')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    Pengumuman Lain Lain
                </button>
            </a>
        </div>
        {{-- Filter short --}}
        <div class="lg:hidden flex item-center gap-8 text-base">
            <a href="{{ url('pengumuman') }}">
                <button
                    class="@if (request()->is('pengumuman')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    Semua
                </button>
            </a>
            <a href="{{ url('pengumuman/PKPU ') }}">
                <button
                    class="@if (request()->is('pengumuman/PKPU')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    PKPU
                </button>
            </a>
            <a href="{{ url('pengumuman/Pailit') }}">
                <button
                    class="@if (request()->is('pengumuman/Pailit')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    Pailit
                </button>
            </a>
            <a href="{{ url('pengumuman/Others') }}">
                <button
                    class="@if (request()->is('pengumuman/Others')) announcement-active @else opacity-50 transition-opacity hover:opacity-100 @endif">
                    Lain Lain
                </button>
            </a>
        </div>

        @if ($announcements->count() === 0)
            <div class="p-8 text-red-700 bg-red-200 rounded-lg">
                <h1>Tidak ada pengumuman.
                </h1>
            </div>
        @else
            <div class="grid grid-rows-1 gap-y-12 lg:gap-y-16">
                @foreach ($announcements as $announcement)
                    <div class="grid grid-cols-12">
                        <div
                            class="mb-1 lg:mb-0 col-span-12 lg:col-span-1 flex items-center lg:border-r-2 lg:border-cBlack lg:pr-8">
                            <h3 class="text-sm lg:text-lg">
                                {{ \Carbon\Carbon::parse($announcement->date)->formatLocalized('%d %B %Y') }}
                            </h3>
                        </div>
                        <div class="col-span-12 lg:col-span-11 flex flex-col gap-3 lg:gap-4 lg:pl-8">
                            <div class="flex flex-col gap-1 lg:gap-2 w-full">
                                <h1 class="font-bold text-base lg:text-lg truncate">
                                    {{ $announcement->title }}
                                </h1>
                                <p class="text-sm lg:text-base line-clamp-2 lg:line-clamp-3 break-all">
                                    {{ $announcement->description }}
                                </p>
                            </div>
                            <button class="gold-btn w-fit text-sm lg:text-base px-4 lg:px-5 py-2 lg:py-2.5"
                                onclick="openModal('{{ $announcement->title }}', '{{ $announcement->description }}', '{{ \Carbon\Carbon::parse($announcement->date)->formatLocalized('%d %B %Y') }}', '{{ $announcement->file }}')">Baca
                                Selengkapnya</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Bottom Pagination --}}
        <div id="bottom-pagination" class="pagination">
            {{ $announcements->onEachSide(0.5)->links() }}
        </div>
    </section>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/pengumuman.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
