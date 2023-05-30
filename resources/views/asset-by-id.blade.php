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

    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        {{-- Title --}}
        <x-page-title title="Detail Aset" />

        <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 md:gap-10 lg:gap-12 xl:gap-14 2xl:gap-16">
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

                <div id="thumbnail-carousel" class="mt-2 splide">
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
            <div class="col-span-1 flex flex-col gap-6 sm:gap-8 md:gap-10 lg:gap-12 xl:gap-14 2xl:gap-16">
                <h1 class="font-bold text-4xl">{{ $asset->name }}</h1>

                <div class="w-full flex flex-col">
                    <h2 class="font-bold text-xl">Nilai:</h2>
                    <p class="text-4xl md:text-5xl font-bold text-cGold">@currency ($asset->price)</p>
                </div>

                <div class="w-full">
                    <table border="0" cellspacing="0" cellpadding="0" id="asset-detail"
                        class="w-full text-sm sm:text-base">
                        <tr class="table-row">
                            <th>Jenis aset</th>
                            <td>{{ $asset->category }}</td>
                        </tr>
                        <tr class="table-row">
                            <th>Lokasi</th>
                            <td>{{ $asset->province }}, {{ $asset->city }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">Detail Pemilik Aset</th>
                        </tr>
                        <tr class="bg-cDarkGrey rounded-t-xl">
                            <th class="pl-4 rounded-tl-lg">Nama</th>
                            <td class="rounded-tr-lg">{{ $asset->owner->owner_name }}</td>
                        </tr>
                        <tr class="bg-cDarkGrey">
                            <th class="pl-4">Alamat</th>
                            <td>{{ $asset->owner->owner_address }}</td>
                        </tr>
                        <tr>
                            <th class="bg-cDarkGrey pb-4 pl-4 rounded-bl-lg">Telepon</th>
                            <td class="bg-cDarkGrey pb-4 rounded-br-lg">{{ $asset->owner->owner_phone }}</td>
                        </tr>
                        <tr class="h-5 border-b-[1px] border-b-cDarkGrey">

                        </tr>
                        <tr>
                            <th colspan="2">Detail Penjual Aset</th>
                        </tr>
                        <tr class="bg-cDarkGrey rounded-t-xl">
                            <th class="pl-4 rounded-tl-lg">Nama</th>
                            <td class="rounded-tr-lg">{{ $asset->seller->seller_name }}</td>
                        </tr>
                        <tr class="bg-cDarkGrey">
                            <th class="pl-4">Alamat</th>
                            <td>{{ $asset->seller->seller_address }}</td>
                        </tr>
                        <tr>
                            <th class="bg-cDarkGrey pb-4 pl-4 rounded-bl-lg">Telepon</th>
                            <td class="bg-cDarkGrey pb-4 rounded-br-lg">{{ $asset->seller->seller_phone }}</td>
                        </tr>
                        <tr class="h-5 border-b-[1px] border-b-cDarkGrey">

                        </tr>
                        <tr class="table-row mt-4">
                            <th>Uraian</th>
                            <td>{{ $asset->status }}</td>
                        </tr>
                        <tr class="table-row">
                            <th>Status Aset</th>
                            <td>{{ $asset->status }}</td>
                        </tr>
                        <tr class="table-row">
                            <th>Lampiran</th>
                            <td>{{ $asset->attachment }}</td>
                        </tr>
                    </table>
                </div>

                <div class="w-full flex flex-col justify-center items-center gap-2 text-sm sm:text-base">
                    <button class="gold-btn rounded-lg font-medium py-4 px-8">Anda berminat? Segera hubungi kami</button>
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
