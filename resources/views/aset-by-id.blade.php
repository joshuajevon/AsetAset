@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/asset-by-id.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="aset" />

    {{-- Search Bar --}}
    <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section>

    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        {{-- Title --}}
        <x-page-title title="Rincian Informasi" />

        <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 md:gap-10 lg:gap-12 xl:gap-14 2xl:gap-16">
            {{-- Carousel --}}
            <div class="col-span-1">
                <div id="main-carousel" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image1/' . $asset->image1) }}" alt="">
                            </li>
                            @if ($asset->image2)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image2/' . $asset->image2) }}" alt="">
                                </li>
                            @endif
                            @if ($asset->image3)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image3/' . $asset->image3) }}" alt="">
                                </li>
                            @endif
                            @if ($asset->image4)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image4/' . $asset->image4) }}" alt="">
                                </li>
                            @endif
                            @if ($asset->image5)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image5/' . $asset->image5) }}" alt="">
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div id="thumbnail-carousel" class="mt-2 splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img src="{{ asset('/storage/asset/image1/' . $asset->image1) }}" alt="">
                            </li>
                            @if ($asset->image2)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image2/' . $asset->image2) }}" alt="">
                                </li>
                            @endif
                            @if ($asset->image3)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image3/' . $asset->image3) }}" alt="">
                                </li>
                            @endif
                            @if ($asset->image4)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image4/' . $asset->image4) }}" alt="">
                                </li>
                            @endif
                            @if ($asset->image5)
                                <li class="splide__slide">
                                    <img src="{{ asset('/storage/asset/image5/' . $asset->image5) }}" alt="">
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-span-1 flex flex-col gap-6 sm:gap-8 md:gap-10 lg:gap-12 xl:gap-14 2xl:gap-16">
                <h1 class="font-bold text-3xl md:text-4xl break-all">{{ $asset->name }}</h1>

                <div class="w-full flex flex-col">
                    <h2 class="font-bold text-lg md:text-xl">Nilai:</h2>
                    <p class="text-4xl md:text-5xl font-bold text-cGold break-all">@currency($asset->price)</p>
                </div>

                <div class="w-full">
                    <table border="0" cellspacing="0" cellpadding="0" id="asset-detail"
                        class="asset-table w-full text-sm sm:text-base">
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
                            <td>{{ $asset->description }}</td>
                        </tr>
                        <tr class="table-row">
                            <th>Status Aset</th>
                            <td>{{ $asset->status }}</td>
                        </tr>
                        <tr class="table-row">
                            <th>Lampiran</th>
                            <td class="flex flex-col gap-1.5">

                                @if(empty($asset->attachment1) && empty($asset->attachment2) && empty($asset->attachment3) && empty($asset->attachment4) && empty($asset->attachment5))
                                    Tidak ada lampiran
                                @endif

                                @if ($asset->attachment1)
                                <a class="flex items-center gap-1 w-fit"
                                    href="{{ asset('/storage/asset/attachment1/' . $asset->attachment1) }}" download>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#C5AF66"
                                        class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z" />
                                    </svg> Lampiran 1
                                </a>
                                @endif

                                @if ($asset->attachment2)
                                    <a class="flex items-center gap-1 w-fit"
                                        href="{{ asset('/storage/asset/attachment2/' . $asset->attachment2) }}" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#C5AF66"
                                            class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z" />
                                        </svg> Lampiran 2
                                    </a>
                                @endif

                                @if ($asset->attachment3)
                                    <a class="flex items-center gap-1 w-fit"
                                        href="{{ asset('/storage/asset/attachment3/' . $asset->attachment3) }}" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#C5AF66" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z" />
                                        </svg> Lampiran 3
                                    </a>
                                @endif

                                @if ($asset->attachment4)
                                    <a class="flex items-center gap-1 w-fit"
                                        href="{{ asset('/storage/asset/attachment4/' . $asset->attachment4) }}" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#C5AF66" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z" />
                                        </svg> Lampiran 4
                                    </a>
                                @endif

                                @if ($asset->attachment5)
                                    <a class="flex items-center gap-1 w-fit"
                                        href="{{ asset('/storage/asset/attachment5/' . $asset->attachment5) }}" download>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="#C5AF66" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z" />
                                        </svg> Lampiran 5
                                    </a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="w-full flex flex-col justify-center items-center gap-2 text-sm sm:text-base">
                    @guest
                        <a href="/asset-error" class="gold-btn rounded-lg font-medium py-4 px-8">Anda berminat? Segera hubungi
                            kami</a>
                    @endguest
                    @auth
                        <a href="https://wa.me/6287876731950?text=Halo%20asetaset.com,%20saya%20{{ Auth::user()->nickname }}%20berminat%20atas:%0D%0AAset:%20{{ $asset->name }}%0D%0ALink:%20https://asetaset.com/aset/{{ $asset->id }}%0D%0AMohon%20informasinya.%20Terima%20kasih." target="_blank"
                            rel="noopener noreferrer" class="gold-btn rounded-lg font-medium py-4 px-8">Anda berminat? Segera
                            hubungi kami</a>
                    @endauth
                    <a class="text-cGold" href="/panduan">Panduan membeli</a>
                </div>
            </div>
        </div>
    </section>


    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/asset-by-id.js') }}?t={{ env('VERSION_TIME') }}"></script>
@endsection
