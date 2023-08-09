<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temukan Aset-aset dengan Mudah di asetaset.com: Layanan Terpercaya untuk Informasi Aset-aset dalam Status Penundaan Kewajiban Pembayaran Utang atau Pailit">

    <title>asetaset.com</title>

    {{-- favicon --}}
    <link rel="icon" href="/favicon.ico" sizes="48x48">
    {{-- <link rel="icon" href="/icon.svg" type="image/svg+xml"> --}}
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="manifest" href="/manifest.webmanifest">

    {{-- Build CSS --}}
    <link rel="stylesheet" href="{{ asset('css/build.css') }}?t={{ env('VERSION_TIME') }}">

    <!-- vite-->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <!-- css & js-->
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}?t={{ env('VERSION_TIME') }}">
</head>


<body class="bg-cLightGrey">
    <div class="flex">
        <nav class="fixed flex flex-col lg:w-72 shrink-0 min-h-screen bg-cGold">
            <div class="flex items-center justify-center lg:justify-start gap-3 bg-white p-2 lg:p-4">
                {{-- <img alt="Man"
                    src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                    class="h-12 w-12 rounded-full object-cover" /> --}}
                <div class="hidden lg:flex flex-col">
                    <p class="text-base font-bold truncate max-w-[250px]">{{ Auth::user()->name }}</p>
                    <span class="block text-sm truncate max-w-[250px]">{{ Auth::user()->email }}</span>
                </div>
            </div>

            <div class="py-6 px-2 lg:px-4 flex flex-col">
                <span
                    class="flex justify-center items-center self-center lg:self-start rounded-lg bg-gray-100 text-xs text-gray-600 p-2 lg:p-4 w-fit">
                    <img class="hidden lg:block w-32" src="{{ asset('assets/logo/asetaset-full.png') }}" alt="logo">
                    <img class="block lg:hidden h-8" src="{{ asset('assets/logo/asetaset-icon.png') }}" alt="logo">
                </span>

                <nav aria-label="Main Nav" class="mt-6 flex flex-col items-center gap-2">
                    <a href="/"
                        class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] w-fit lg:w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>

                        <span class="hidden lg:inline text-base font-medium"> Beranda </span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-2.5 bg-gray-100 rounded-lg px-2 lg:px-4 py-2 lg:py-3 text-cGold w-fit lg:w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="hidden lg:inline text-base font-medium"> Akun </span>
                    </a>

                    <div class="bg-cWhite h-0.5 w-full my-2"></div>

                    <form class="w-fit lg:w-full" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-red-700 bg-red-100 w-full flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>

                            <span class="hidden lg:inline text-base font-medium"> Logout </span>
                        </button>
                    </form>
                </nav>
            </div>
        </nav>

        {{-- Profile --}}
        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Pengaturan Akun</h1>

            <div class="flex flex-col gap-4">
                @if (Auth::user()->gender == 'Laki-laki')
                    <h1 class="text-lg lg:text-xl xl:text-2xl 2xl:text-3xl text-cGold">Bapak,</h1>
                @else
                    <h1 class="text-lg lg:text-xl xl:text-2xl 2xl:text-3xl text-cGold">Ibu,</h1>
                @endif

                <h1 class="text-lg lg:text-xl xl:text-2xl 2xl:text-3xl text-cBlack">{{ Auth::user()->name }}</h1>
            </div>

            <div class="flex flex-col gap-16 w-full">
                <div class="p-4 sm:p-8 bg-cWhite sm:rounded-lg">
                    <div class="">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-cWhite sm:rounded-lg">
                    <div class="">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-cWhite sm:rounded-lg">
                    <div class="">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="ml-[72px] lg:ml-[18rem]">
        <x-developed-by />
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('js/user-dashboard.js') }}?t={{ env('VERSION_TIME') }}"></script>
    <script src="{{ asset('js/developed-by.js') }}?t={{ env('VERSION_TIME') }}"></script>
</body>

</html>
