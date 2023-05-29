@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="aset" />

    {{-- Search Bar --}}
    <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section>

    {{-- Asets --}}
    <section class="c-container py-8 lg:py-16 xl:py-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        {{-- Title --}}
        <div class="flex justify-center items-center gap-8">
            <h1 class="text-4xl font-bold text-cGold">Galeri Aset</h1>
            <div class="flex-1 h-1 bg-cGold"></div>
        </div>

        <div class="grid grid-cols-3 xl:grid-cols-4 gap-8">
            {{-- Filter --}}
            <div class="hidden xl:flex flex-col bg-cWhite grow col-span-1 h-fit rounded-lg">
                <div class="md:p-5 lg:p-6 xl:p-7 2xl:p-8 bg-cDarkGrey rounded-t-lg">
                    <h1 class="font-bold text-center text-xl">Filter Pencarian Aset</h1>
                </div>

                <form action="{{ route('asset') }}" method="get">
                    <div class="md:p-5 lg:p-6 xl:p-7 2xl:p-8 flex flex-col gap-8">
                        <div class="flex flex-col gap-2">
                            <h2 class="text-lg font-bold">Jenis Aset</h2>
                            @foreach ($categories as $category)
                                <div class="text-base flex items-center gap-2">
                                    <input id="filter-{{ $category }}" type="checkbox" name="categories[]"
                                        value="{{ $category }}"
                                        class="cursor-pointer rounded-sm appearance-none text-cGold focus:ring-0 focus:ring-offset-0" />
                                    <label for="filter-{{ $category }}">{{ $category }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex flex-col gap-2">
                            <h2 class="text-lg font-bold">Wilayah</h2>
                            <select class="cursor-pointer rounded-md" name="provinces[]" id="provinsi">
                                <option value="" disabled selected>Pilih Provinsi</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                            <select class="cursor-pointer rounded-md" name="cities[]" id="kota">
                                <option value="" disabled selected>Pilih Kota</option>
                                <option value="Jakarta Barat">Jakarta Barat</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Surakarta">Surakarta</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-2">
                            <h2 class="text-lg font-bold">Rentang Harga</h2>
                            <div class="flex items-center border rounded-md pl-4">
                                <label for="filter-harga-min">Rp.</label>
                                <input class="w-full rounded-lg border-none" type="number" name="min-price"
                                    id="filter-harga-min" placeholder="Harga Minimum">
                            </div>
                            <div class="flex items-center border rounded-md pl-4">
                                <label for="filter-harga-max">Rp.</label>
                                <input class="w-full rounded-lg border-none" type="number" name="max-price"
                                    id="filter-harga-max" placeholder="Harga Maksimum">
                            </div>
                        </div>
                    </div>

                    <div class="md:p-5 lg:p-6 xl:p-7 2xl:p-8 bg-cDarkGrey flex justify-center items-center rounded-b-lg">
                        <button class="gold-btn w-full" type="submit">Terapkan</button>
                    </div>
                </form>
            </div>

            {{-- Aset galeri --}}
            <div class="flex flex-col gap-8 col-span-3">
                @if ($assets->count() == 0)
                    <div class="p-8 text-red-700 bg-red-200 rounded-lg">
                        <h1>Maaf, hasil pencarian aset dengan kata kunci "{{ $result }}" belum tersedia. <a
                                href="/" class="underline text-blue-500">Klik disini</a> untuk kembali ke Beranda</h1>
                    </div>
                @else
                    <div class="p-8 bg-cDarkGrey rounded-lg">
                        <h1>Hasil pencarian aset dengan kata kunci "{{ $result }}"</h1>
                    </div>

                    {{-- Top Pagination --}}
                    {{-- <div id="top-pagination" class="pagination">
                        {{ $assets->appends(['filter' => $selectedFilter])->links() }}
                    </div> --}}

                    {{-- Sort and Mobile Filter --}}
                    <div class="flex justify-between sm:justify-start items-center gap-4">
                        {{-- Sorting --}}
                        <div class="flex justify-start items-center gap-2">
                            <label class="hidden sm:block text-lg font-bold" for="sortOption">Urutkan:</label>
                            <form action="{{ route('welcome') }}" method="GET">
                                <select class="cursor-pointer rounded-md" name="filter" id="filter"
                                    onchange="this.form.submit()">
                                    <option value="" selected disabled>-- Pilih Filter --</option>
                                    <option value="latest" {{ Request::query('filter') === 'latest' ? 'selected' : '' }}>
                                        Terbaru</option>
                                    <option value="price_low_high"
                                        {{ Request::query('filter') === 'price_low_high' ? 'selected' : '' }}>Nilai
                                        Termurah
                                    </option>
                                    <option value="price_high_low"
                                        {{ Request::query('filter') === 'price_high_low' ? 'selected' : '' }}>Nilai
                                        Termahal
                                    </option>
                                </select>
                            </form>
                        </div>

                        {{-- Mobile filter button --}}
                        <button class="xl:hidden gold-btn flex justify-center items-center gap-2 w-fit py-2 rounded-md"
                            onclick="openFilter()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-filter" viewBox="0 0 16 16">
                                <path
                                    d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                            </svg>
                            Filter</button>
                        {{-- Mobile Filter Popup --}}
                        <dialog id="dialog-filter">
                            <p>Filter</p>
                            <form method="dialog">
                                <button class="gold-btn">OK</button>
                            </form>
                        </dialog>
                    </div>

                    {{-- Items --}}
                    <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-2 sm:gap-3 lg:gap-4">
                        @foreach ($assets as $asset)
                            <a href="{{ route('asset-by-id', $asset->id) }}"
                                class="group bg-cWhite border border-cDarkGrey p-2 sm:p-3 md:p-4 flex flex-col justify-center items-center gap-4">
                                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}" class="aspect-square object-cover"
                                        alt="asset">

                                <div
                                    class="relative bg-white flex flex-col justify-center items-center gap-1 sm:gap-2 lg:gap-4">
                                    <p class="text-center text-xs sm:text-base">{{ $asset->name }}</p>
                                    <h3 class="text-center text-sm sm:text-lg lg:text-2xl text-cGold font-bold">
                                        @currency ($asset->price)
                                    </h3>
                                    <div class="flex justify-center items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path
                                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                        <p class="text-center text-xs sm:text-sm">{{ $asset->province }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif

                {{-- Bottom pagination --}}
                {{-- <div id="bottom-pagination" class="pagination">
                    {{ $assets->appends(['filter' => $selectedFilter])->links() }}
                </div> --}}
            </div>
        </div>


    </section>



    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/beranda.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
