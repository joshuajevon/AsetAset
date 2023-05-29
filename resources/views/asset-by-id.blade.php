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
    <section class="c-container pt-32 pb-16 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <div class="self-center w-full max-w-[800px] ">
            <form class="w-full gap-2 text-base">
                <div class="py-3 px-6 flex rounded-full bg-cGold text-cWhite">
                    <input type="text" class="w-full bg-transparent border-none placeholder:text-cWhite" id="search"
                        name="search" placeholder="Pencarian...">
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
    </section>

    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        <div class="flex justify-center items-center gap-8">
            <h1 class="text-4xl font-bold text-cGold">Detail Aset</h1>
            <div class="flex-1 h-1 bg-cGold"></div>
        </div>

        <div class="grid grid-cols-2 gap-16">
            <div class="col-span-1">
                <div id="main-carousel" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}"" alt="">
                            </li>
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}" alt="">
                            </li>
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="thumbnail-carousel" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}"" alt="">
                            </li>
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}" alt="">
                            </li>
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-1 flex flex-col gap-16">
                <h1 class="font-bold text-4xl">{{ $asset->name }}</h1>

                <div class="w-full flex flex-col">
                    <h2 class="font-bold text-xl">Nilai:</h2>
                    <p class="text-5xl font-bold text-cGold">@currency ($asset->price)</p>
                </div>

                <div class="w-full">
                    <table id="asset-detail" class="w-full">
                        <tr>
                          <th>Jenis aset</th>
                          <td>{{ $asset->category }}</td>
                        </tr>
                        <tr>
                          <th>Lokasi</th>
                          <td>{{ $asset->province }}, {{ $asset->city }}</td>
                        </tr>
                        <tr>
                          <th>Detail Pemilik Aset</th>
                          <td>Temporary</td>
                        </tr>
                        <tr>
                          <th>Detail Penjual Aset</th>
                          <td>Temporary</td>
                        </tr>
                        <tr>
                          <th>Uraian</th>
                          <td>{{ $asset->status }}</td>
                        </tr>
                        <tr>
                          <th>Status Aset</th>
                          <td>{{ $asset->status }}</td>
                        </tr>
                        <tr>
                          <th>Lampiran</th>
                          <td>{{ $asset->attachment }}</td>
                        </tr>
                    </table>
                </div>

                <div class="w-full flex flex-col justify-center items-center gap-2">
                    <button class="gold-btn font-medium">Anda berminat? Segera hubungi kami</button>
                    <a class="text-cGold" href="/panduan">Panduan membeli</a>
                </div>
            </div>
        </div>
    </section>


    {{-- <table style="border:1px solid black">
        <th>
        <td>name</td>
        <td>category</td>
        <td>province</td>
        <td>city</td>
        <td>price</td>
        <td>seller name</td>
        <td>seller add</td>
        <td>seller phone</td>
        <td>owner name</td>
        <td>owner add</td>
        <td>owner phone</td>
        <td>description</td>
        <td>status</td>
        <td>attachment</td>
        <td>image</td>
        </th>
        <tr>

            <td>{{ $asset->name }}</td>
            <td>{{ $asset->category }}</td>
            <td>{{ $asset->province }}</td>
            <td>{{ $asset->city }}</td>
            <td>@currency ($asset->price)</td>
            <td>{{ $asset->seller->seller_name }}</td>
            <td>{{ $asset->seller->seller_address }}</td>
            <td>{{ $asset->seller->seller_phone }}</td>
            <td>{{ $asset->owner->owner_name }}</td>
            <td>{{ $asset->owner->owner_address }}</td>
            <td>{{ $asset->owner->owner_phone }}</td>
            <td>{{ $asset->description }}</td>
            <td>{{ $asset->status }}</td>
            <td>{{ $asset->attachment }}</td>
            <td>
                <img src="{{ asset('/storage/asset/image/' . $asset->image) }}"
                    class="object-fit-contain rounded card-img-top" style="width: 50px" alt="asset">
            </td>
        </tr>
    </table> --}}

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/asset-by-id.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
