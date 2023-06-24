<!DOCTYPE html>
<html lang="id">

<head>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aset Aset</title>
        <link rel="shortcut icon" href="{{ asset('assets/logo/asetaset-icon.png') }}" type="image/x-icon">

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
    </head>
</head>

<body class="bg-cLightGrey">
    <section
        class="min-h-screen c-container flex flex-col justify-center gap-8 lg:gap-12 xl:gap-16">
        <x-page-title title="Verifikasi Email" />

        <div
            class="bg-cWhite py-12 sm:py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32 px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 2xl:px-16 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6 sm:gap-8">
            <img class="w-28 sm:w-32 md:w-36 lg:w-40 xl:w-44 2xl:w-48"
                src="{{ asset('assets/logo/asetaset-full.png') }}" alt="logo">

            <p class="text-cBlack text-sm sm:text-base">
                Terima kasih telah mendaftar di asetaset.com. Sebelum memulai, mohon untuk <span
                    class="font-bold">memverifikasi</span> email yang
                didaftarkan dengan menekan link yang telah kami kirim ke <span class="font-bold">email Anda</span>. Jika
                Anda
                <span class="font-bold">tidak</span> mendapatkan email dari
                kami, dengan senang hati kami akan mengirim ulang.
            </p>

            @if (Auth::user()->hasVerifiedEmail())
                <p class="text-green-600 font-bold">Sudah verifikasi</p>
            @else
                <p class="text-red-600 font-bold">Belum verifikasi</p>
            @endif

            <div class="w-full flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 sm:gap-8">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Kirim Ulang Link Verifikasi') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-danger-button>
                        {{ __('Logout') }}
                    </x-danger-button>
                </form>
            </div>

            @if (session('status') == 'verification-link-sent')
                <p class="font-bold text-sm text-green-600">
                    Kami telah mengirim link verifikasi baru ke alamat email yang Anda berikan saat registrasi.
                </p>
            @endif
        </div>
    </section>
</body>

</html>
