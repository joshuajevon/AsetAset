@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
@endsection

@section('body')
    <x-navigation-bar page="panduan" />

    {{-- Search Bar --}}
    <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section>

    <section class="c-container pb-8 lg:pb-16 xl:pb-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        {{-- Title --}}
        <x-page-title title="Panduan" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div class="col-span-1 flex justify-center items-center">
                <div class="w-full flex flex-col justify-center items-start gap-4 sm:gap-6 lg:gap-8">
                    <div class="flex flex-col gap-4 sm:gap-5 lg:gap-6 mb-8">
                        <a class="flex items-center gap-3 transition hover:text-cGold" href="mailto:info@asetaset.com">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#C5AF66"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                            info@asetaset.com
                        </a>
                        <a href="https://wa.me/6287876731950" target="_blank" rel="noopener noreferrer"
                            class="flex items-center gap-3 transition hover:text-cGold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#C5AF66"
                                class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                            0818995628
                        </a>
                        <a href="https://wa.me/6287876731950" target="_blank" rel="noopener noreferrer"
                            class="flex items-center gap-3 transition hover:text-cGold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#C5AF66"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            0818995628
                        </a>
                    </div>

                    <img class="w-28 sm:w-32 md:w-36 lg:w-40 xl:w-44 2xl:w-48"
                        src="{{ asset('assets/logo/asetaset-full.png') }}" alt="logo">
                    <h1 class="text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-medium">Butuh Bantuan?</span>
                    </h1>
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

            </div>

            <div class="col-span-1 flex flex-col justify-start items-center gap-16">
                <div class="flex flex-col justify-center items-center gap-4">
                    <img class="w-28 sm:w-32 md:w-36 lg:w-40 xl:w-44 2xl:w-48"
                        src="{{ asset('assets/logo/asetaset-full.png') }}" alt="logo">
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-center">Panduan Lengkap Penggunaan
                        asetaset.com<br>Memperoleh Aset yang Sesuai dengan Keinginan Anda</h1>
                </div>

                <div class="flex flex-col gap-4 w-full">
                    <iframe
                        src="{{ asset('assets/panduan/Panduan Cara Membeli Aset.pdf#view=fitH') }}?t={{ env('VERSION_TIME') }}"
                        width="100%" height="500px">
                        <p>Anda tidak memiliki plugin PDF untuk browser ini, silakan unduh panduan melalui link di bawah</p>
                    </iframe>

                    <a href="{{ asset('assets/panduan/Panduan Cara Membeli Aset.pdf') }}?t={{ env('VERSION_TIME') }}"
                        download class="gold-btn gap-2 w-fit self-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        Unduh Panduan
                    </a>
                </div>

                <div class="flex flex-col gap-4 w-full">
                    <iframe
                        src="{{ asset('assets/panduan/Panduan Cara Membuat Akun.pdf#view=fitH') }}?t={{ env('VERSION_TIME') }}"
                        width="100%" height="500px">
                        <p>Anda tidak memiliki plugin PDF untuk browser ini, silakan unduh panduan melalui link di bawah</p>
                    </iframe>
                    <a href="{{ asset('assets/panduan/Panduan Cara Membuat Akun.pdf') }}?t={{ env('VERSION_TIME') }}"
                        download class="gold-btn gap-2 w-fit self-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        Unduh Panduan
                    </a>
                </div>

                <div class="flex flex-col gap-4 w-full">
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('assets/panduan/Panduan Cara Membuat Akun.pdf#view=fitH') }}?t={{ env('VERSION_TIME') }}"
                        width="100%" height="500px">
                        <p>Anda tidak memiliki plugin PDF untuk browser ini, silakan unduh panduan melalui link di bawah</p>
                    </iframe>
                    <a href="{{ asset('assets/panduan/Panduan Cara Membuat Akun.pdf') }}?t={{ env('VERSION_TIME') }}"
                        download class="gold-btn gap-2 w-fit self-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        Unduh Panduan
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
