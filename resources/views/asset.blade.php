@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="aset" />

    <form action="{{ route('assets') }}" method="get">
        {{-- Search Bar --}}
        <section class="c-container flex justify-center items-center pt-32 pb-16">
            <div class="self-center w-full max-w-[800px]">
                <div class="py-1 sm:py-2 lg:py-3 px-6 sm:px-7 lg:px-8 flex rounded-full bg-cGold text-cWhite">
                    <input id="searchbar" autocomplete="false" type="text"
                        class="w-full bg-transparent border-none placeholder:text-cWhite px-0 autofill:shadow-[inset_0_0_0px_1000px_rgb(197,175,102)]"
                        id="search" name="search" placeholder="Pencarian..." value="{{ $result }}">
                    <button type="submit" class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- Asets --}}
        <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
            {{-- Title --}}
            <x-page-title title="Pencarian Aset" />

            <div class="grid grid-cols-3 xl:grid-cols-4 gap-8">
                {{-- Filter --}}
                <div id="dialog-filter" class="hidden xl:block xl:col-span-1 xl:h-fit bg-cBlack/50 xl:bg-transparent">
                    <div id="form-filter" class="bg-cWhite rounded-lg">
                        <div
                            class="p-5 lg:p-6 xl:p-7 2xl:p-8 bg-cDarkGrey rounded-t-lg flex justify-between xl:justify-center items-center">
                            <h1 class="font-bold text-center text-xl">Filter Pencarian Aset</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="xl:hidden w-7 h-7" onclick="closeFilter()">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>

                        <div class="p-5 lg:p-6 xl:p-7 2xl:p-8 flex flex-col gap-8">
                            <div class="flex flex-col gap-2">
                                <h2 class="text-lg font-bold">Jenis Aset</h2>
                                @foreach ($categories as $category)
                                    <div class="text-base flex items-center gap-2">
                                        <input id="filter-{{ $category }}" type="checkbox" name="categories[]"
                                            value="{{ $category }}"
                                            class="cursor-pointer rounded-sm appearance-none text-cGold focus:ring-0 focus:ring-offset-0"
                                            {{ in_array($category, $selectedCategories) ? 'checked' : '' }} />
                                        <label class="cursor-pointer"
                                            for="filter-{{ $category }}">{{ $category }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex flex-col gap-2">
                                <h2 class="text-lg font-bold">Wilayah</h2>
                                <select class="cursor-pointer rounded-md" name="provinces[]" id="provinsi"
                                    onchange="updateCitySelect()">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                    <option value="">Semua Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province }}"
                                            {{ in_array($province, $selectedProvinces) ? 'selected' : '' }}>
                                            {{ $province }}
                                        </option>
                                    @endforeach
                                </select>

                                <select class="cursor-pointer rounded-md" name="cities[]" id="kota"
                                    onchange="updateProvinceSelect()">
                                    <option value="" disabled selected>Pilih Kota</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city }}"
                                            {{ in_array($city, $selectedCities) ? 'selected' : '' }}>
                                            {{ $city }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col gap-2">
                                <h2 class="text-lg font-bold">Rentang Harga</h2>
                                <div class="flex items-center border rounded-md pl-4">
                                    <label for="filter-harga-min">Rp.</label>
                                    <input class="w-full rounded-lg border-none" type="number" name="min-price"
                                        value="{{ $minPrice }}" id="filter-harga-min" placeholder="Harga Minimum">
                                </div>
                                <div class="flex items-center border rounded-md pl-4">
                                    <label for="filter-harga-max">Rp.</label>
                                    <input class="w-full rounded-lg border-none" type="number" name="max-price"
                                        value="{{ $maxPrice }}" id="filter-harga-max" placeholder="Harga Maksimum">
                                </div>
                            </div>
                        </div>

                        <div
                            class="p-5 lg:p-6 xl:p-7 2xl:p-8 bg-cDarkGrey flex flex-col justify-center items-center gap-4 rounded-b-lg">
                            <button class="gold-btn w-full" type="submit">Terapkan</button>
                            <a href="/" class="white-btn w-full">Hapus
                                Filter</a>
                        </div>
                    </div>
                </div>

                {{-- Aset galeri --}}
                <div class="flex flex-col gap-8 col-span-3">
                    @if ($assets->count() == 0)
                        <div class="p-4 sm:p-6 lg:p-8 text-red-700 bg-red-200 rounded-lg">
                            <h1>Maaf, hasil pencarian aset dengan kata kunci "{{ $result }}" belum tersedia. <a
                                    href="/" class="underline text-blue-500">Klik disini</a> untuk kembali ke Beranda
                            </h1>
                        </div>

                        <div
                            class="py-6 sm:py-8 md:py-10 lg:py-12 xl:py-14 2xl:py-16  flex flex-col justify-center items-start h-[200px] sm:h-[250px] md:h-[300px] lg:h-[350px] xl:h-[400px] gap-2 sm:gap-4 lg:gap-6">
                            <img class="w-28 sm:w-32 md:w-36 lg:w-40 xl:w-44 2xl:w-48"
                                src="{{ asset('assets/logo/asetaset-full.png') }}" alt="logo">
                            <h1 class="font-medium text-2xl sm:text-3xl lg:text-4xl text-cBlack">Butuh Bantuan?</h1>
                            <h2 class="text-xl sm:text-2xl lg:text-3xl text-cBlack">Jangan Ragu Untuk Menghubungi Kami</h2>
                            <a class="gold-btn group relative inline-flex items-center overflow-hidden px-10 focus:outline-none text-base sm:text-lg lg:text-xl"
                                href="/hubungi-kami">
                                <span class="absolute -end-full transition-all group-hover:end-4">
                                    <svg class="h-4 sm:h-5 lg:h-6 aspect-square rtl:rotate-180"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>

                                <span class="transition-all group-hover:me-4">
                                    Hubungi Kami
                                </span>
                            </a>
                        </div>
                    @else
                        @if ($result)
                            <div class="p-4 sm:p-6 lg:p-8 bg-cDarkGrey rounded-lg">
                                <h1>Hasil pencarian aset dengan kata kunci "{{ $result }}"</h1>
                            </div>
                        @endif

                        {{-- Top Pagination --}}
                        <div id="top-pagination" class="pagination">
                            {{ $assets->onEachSide(0.5)->links() }}
                        </div>

                        {{-- Sort and Mobile Filter --}}
                        <div class="flex justify-between sm:justify-start items-center gap-4">
                            {{-- Sorting --}}
                            <div class="flex justify-start items-center gap-2">
                                <label class="hidden sm:block text-lg font-bold" for="sortOption">Urutkan:</label>
                                <form action="{{ route('assets') }}" method="GET">
                                    <select class="cursor-pointer rounded-md" name="filter" id="filter"
                                        onchange="this.form.submit()">
                                        <option value="" selected disabled>-- Pilih Filter --</option>
                                        <option value="latest"
                                            {{ Request::query('filter') === 'latest' ? 'selected' : '' }}>
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
                            <button type="button"
                                class="xl:hidden gold-btn flex justify-center items-center gap-2 w-fit py-2 rounded-md"
                                onclick="openFilter()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg>
                                Filter
                            </button>
                        </div>

                        {{-- Items --}}
                        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-2 sm:gap-3 lg:gap-4">
                            @foreach ($assets as $asset)
                                <a href="/aset/{{ $asset->id }}"
                                    class="group bg-cWhite border border-cDarkGrey p-2 sm:p-3 md:p-4 flex flex-col justify-center items-center gap-4 hover:bg-cGold transition">
                                    <img src="{{ asset('/storage/asset/image1/' . $asset->image1) }}"
                                        class="aspect-square object-cover" alt="asset">

                                    <div
                                        class="flex flex-col justify-center items-center gap-1 sm:gap-2 lg:gap-4 group-hover:text-cWhite w-full">
                                        <div class="flex justify-center items-center w-full">
                                            <p class="text-center text-xs sm:text-base whitespace-nowrap truncate">
                                                {{ $asset->name }}</p>
                                        </div>

                                        <div class="flex justify-center items-center w-full">
                                            <h3
                                                class="text-sm sm:text-lg lg:text-2xl text-cGold font-bold group-hover:text-cWhite whitespace-nowrap truncate">
                                                @currency ($asset->price)
                                            </h3>
                                        </div>

                                        <div class="flex justify-center items-center gap-1 group-hover:text-cWhite w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                                <path
                                                    d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                            <p class="text-center text-xs sm:text-sm whitespace-nowrap truncate">
                                                {{ $asset->province }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    {{-- Bottom pagination --}}
                    <div id="bottom-pagination" class="pagination">
                        {{ $assets->onEachSide(0.5)->links() }}
                    </div>
                </div>
            </div>
        </section>
    </form>

    {{-- Scripts --}}
    <script src="{{ asset('js/asset.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
