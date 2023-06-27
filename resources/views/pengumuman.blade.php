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

    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <x-page-title title="Pengumuman" />
    </section>

    {{-- Filters --}}
    <div class="flex flex-row item-center">
        <a href="{{url('pengumuman')}}">
            <button class="">All</button>
        </a>
        <a href="{{url('pengumuman/PKPU ')}}">
            <button class="">Pengumuman PKPU</button>
        </a>
        <a href="{{url('pengumuman/Pailit')}}">
            <button class="">Pengumuman Pailit</button>
        </a>
        <a href="{{url('pengumuman/Others')}}">
            <button class="">Pengumuman Lain-lain</button>
        </a>
    </div>

    <table class="w-full divide-y-2 divide-cGold bg-white text-sm border border-cGold table-auto">
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
                    <td class="whitespace-nowrap px-4 py-2">{{ \Carbon\Carbon::parse($announcement->date)->formatLocalized('%d %B %Y') }}
                    </td>
                    <td class="whitespace-nowrap px-4 py-2">
                        <img src="{{ asset('/storage/asset/announcement/' . $announcement->file) }}"
                            class="object-fit-contain rounded card-img-top" style="width: 300px" alt="announcement">
                    </td>
            </tbody>
        @endforeach
    </table>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    {{-- <script src="{{ asset('js/beranda.js') }}?t={{ env('VERSION_TIME') }}"></script> --}}
@endsection
