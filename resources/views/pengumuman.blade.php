@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/beranda.css') }}?t={{ env('VERSION_TIME') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}?t={{ env('VERSION_TIME') }}"> --}}
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
        <div class="bg-cWhite w-full h-[70%] rounded-lg flex flex-col">
            <div
                class="p-5 sm:p-6 md:p-7 lg:p-8 xl:p-9 2xl:p-10 bg-cDarkGrey rounded-t-lg flex justify-between items-center">
                <h1 class="font-bold text-center text-2xl">Pengumuman</h1>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-8 h-8 cursor-pointer" onclick="closeModal()">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="p-5 sm:p-6 md:p-7 lg:p-8 xl:p-9 2xl:p-10 flex flex-col gap-8 overflow-y-scroll h-full">
                <h2 id="announcement-date" class="text-base opacity-75"></h2>
                <h1 id="announcement-title" class="text-3xl font-bold"></h1>
                <p id="announcement-desc" class="text-lg"></p>
                <img id="announcement-file" src="" alt="announcement-image">
            </div>
        </div>
    </div>

    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <x-page-title title="Pengumuman" />

        {{-- Filters long --}}
        <div class="hidden lg:flex item-center gap-8">
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
        <div class="lg:hidden flex item-center gap-8">
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
            Tidak ada pengumuman
        @else
            <div class="grid grid-rows-1 gap-y-16">
                @foreach ($announcements as $announcement)
                    <div class="grid grid-cols-12">
                        <div class="col-span-1 text-lg flex items-center border-r-2 border-cBlack pr-8">
                            {{ \Carbon\Carbon::parse($announcement->date)->formatLocalized('%d %B %Y') }}
                        </div>
                        <div class="col-span-11 flex flex-col gap-3 lg:gap-4 pl-8">
                            <h1 class="font-bold text-base lg:text-lg">
                                {{ $announcement->title }}
                            </h1>
                            <p class="text-sm lg:text-base line-clamp-2 lg:line-clamp-3">
                                {{ $announcement->description }}
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos iste deserunt doloribus
                                consectetur veritatis expedita odit, impedit quaerat, sapiente necessitatibus cum nam ipsam
                                nihil voluptas aliquam, modi sunt sit soluta? Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Nostrum tempora eaque quae et, nam aspernatur voluptas minus illum facere
                                magnam quaerat ipsam aliquam omnis sit natus nesciunt, neque veritatis culpa. Lorem ipsum,
                                dolor sit amet consectetur adipisicing elit. Magni modi incidunt dolores facilis nobis sint
                                reiciendis, excepturi tenetur beatae repudiandae eligendi similique fuga iste veritatis,
                                dicta pariatur eum amet voluptate?
                            </p>
                            <button class="gold-btn w-fit text-sm lg:text-base"
                                onclick="openModal('{{ $announcement->title }}', '{{ $announcement->description }}', '{{ \Carbon\Carbon::parse($announcement->date)->formatLocalized('%d %B %Y') }}', '{{ $announcement->file }}')">Baca
                                Selengkapnya</button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <table class="w-full divide-y-2 divide-cGold bg-white text-sm border border-cGold table-auto">
                <thead class="text-left text-base">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Title
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Description
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Date
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            File
                        </th>
                    </tr>
                </thead>
                @foreach ($announcements as $announcement)
                    <tbody class="divide-y divide-cGold text-sm">
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2">{{ $announcement->title }}</td>
                            <td class="whitespace-nowrap px-4 py-2">{{ $announcement->description }}</td>
                            <td class="whitespace-nowrap px-4 py-2">
                                {{ \Carbon\Carbon::parse($announcement->date)->formatLocalized('%d %B %Y') }}
                            </td>
                            <td class="whitespace-nowrap px-4 py-2">
                                <img src="{{ asset('/storage/asset/announcement/' . $announcement->file) }}"
                                    class="object-fit-contain rounded card-img-top" style="width: 300px" alt="announcement">
                            </td>
                    </tbody>
                @endforeach
            </table> --}}
        @endif

    </section>
    {{-- Bottom Pagination --}}
    <div id="top-pagination" class="pagination">
        {{ $announcements->onEachSide(0.5)->links() }}
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/pengumuman.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
