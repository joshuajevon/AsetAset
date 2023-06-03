@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')
    <x-navigation-bar page="hubungi-kami" />

    {{-- Search Bar --}}
    <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section>

    <section
        class="c-container bg-cLightGrey bg-cover bg-center bg-[url('/public/assets/hubungi-kami/hubungi-kami-bg.png')] py-6 sm:py-8 md:py-10 lg:py-12 xl:py-14 2xl:py-16 flex justify-center items-center">
        <div
            class="flex flex-col justify-center items-center h-[200px] sm:h-[250px] md:h-[300px] lg:h-[350px] xl:h-[400px] gap-2">
            <h2 class="text-cGold font-medium text-base sm:text-xl lg:text-2xl text-center">asetaset.com</h2>
            <h1
                class="font-extrabold text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-8xl text-cWhite text-center">
                Tim AsetAset Siap Membantu Anda</h1>
        </div>
    </section>

    <section class="c-container py-8 lg:py-16 xl:py-32 flex flex-col gap-8 lg:gap-12 xl:gap-16">
        {{-- Title --}}
        <x-page-title title="Hubungi Kami" />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 sm:gap-16 md:gap-20 lg:gap-24 xl:gap-28 2xl:gap-32">
            <div class="col-span-1 flex justify-center items-center">
                <div class="w-full flex flex-col justify-center items-start gap-4 sm:gap-6 lg:gap-8">
                    <h2 class="text-cGold font-medium text-base sm:text-xl lg:text-2xl text-center">asetaset.com</h2>
                    <h1 class="text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-medium">Butuh Informasi
                        Tentang Kami?</span>
                    </h1>
                    <p class="text-base sm:text-lg">Hubungi kami melalui email atau whatsapp yang ada dibawah ini dan
                        tim kami akan segera menghubungi anda</span>.
                    </p>

                    <h2 class="font-medium text-2xl sm:text-3xl lg:text-4xl text-cBlack">Kontak Bisnis</h2>

                    <div class="flex flex-col gap-4 sm:gap-5 lg:gap-6">
                        <a class="flex items-center gap-3 transition hover:text-cGold" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#C5AF66"
                                class="bi bi-envelope" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                            info@asetaset.com
                        </a>
                        <a class="flex items-center gap-3 transition hover:text-cGold" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#C5AF66" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                              </svg>
                            (021) 778112
                        </a>
                        <a class="flex items-center gap-3 transition hover:text-cGold" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#C5AF66"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            0812784958321
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-span-1">
                <form id="form-hubungi-kami" method="POST" action="{{ route('contact') }}"
                    class="bg-cWhite py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32 px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 2xl:px-16 flex flex-col justify-center items-start gap-6"
                    onsubmit="submitLoginForm(event)">
                    @csrf
                    <div class="w-full flex flex-col justify-center items-start gap-4 sm:gap-6 lg:gap-8 px-4 pb-5 border-b-2 border-b-cGold">
                        <h2 class="text-cGold font-medium text-base sm:text-xl lg:text-2xl text-center">asetaset.com</h2>
                        <h1 class="text-4xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-medium">Jangan
                            Ragu Untuk Menghubungi Kami</span>
                        </h1>
                        <p class="text-base sm:text-lg">Silahkan isi data diri anda, dan tim kami akan segera menghubungi
                            untuk membantu anda</span>.
                        </p>
                    </div>

                    {{-- Nama --}}
                    <div class="px-4 w-full pt-2 sm:pt-4 lg:pt-6">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="nama-hubungi-kami" :value="__('Nama')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false" placeholder="Nama Anda" id="nama-hubungi-kami"
                            class="mt-1 w-full" type="text" name="name" />
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alamat Email --}}
                    <div class="px-4 w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="email-hubungi-kami" :value="__('Alamat Email')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false" placeholder="contoh@gmail.com" id="email-hubungi-kami"
                            class="mt-1 w-full" type="text" name="email" />
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div class="px-4 w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="subjek-hubungi-kami" :value="__('Subjek')" />
                            <span class="text-red-500">*</span>
                        </div>
                        <x-text-input autocomplete="false" placeholder="Judul Pesan Anda" id="subjek-hubungi-kami"
                            class="mt-1 w-full" type="text" name="subject" />
                        @error('subject')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pesan --}}
                    <div class="px-4 w-full">
                        <div class="flex gap-1 text-base sm:text-lg">
                            <x-input-label for="pesan-hubungi-kami" :value="__('Pesan')" />
                            <span class="text-red-500">*</span>
                        </div>

                        <textarea name="mail" placeholder="Isi Pesan Anda"
                            class="w-full mt-1 resize-none p-4 border border-cDarkGrey rounded-md text-sm sm:text-base bg-cWhite autofill:shadow-[inset_0_0_0px_1000px_rgb(255,255,255)]"
                            id="pesan-hubungi-kami" rows="8"></textarea>
                        @error('mail')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Error Message --}}
                    {{-- <div class="px-4">
                        <p id="error-message-login" class="text-base text-red-600"></p>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div> --}}


                    <div class="px-4">
                        <button type="submit" class="gold-btn px-12">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
