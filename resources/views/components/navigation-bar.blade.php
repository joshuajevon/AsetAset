<nav id="navbar" class="text-base fixed w-full z-50">
    <div class="c-container bg-cBlack mx-auto flex h-20 w-full items-center gap-8 ">
        <a class="block text-cGold" href="/">
            <span class="sr-only">Home</span>
            <svg class="h-8" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                    fill="currentColor" />
            </svg>
        </a>

        <div id="web-nav-links" class="flex flex-1 items-center justify-end lg:justify-between">
            <div aria-label="Site Nav" class="hidden lg:block gap-6">
                <ul class="flex justify-center items-center gap-6 w-full">
                    <li>
                        <a class="nav-link @if ($page == 'beranda') underline @endif" href="/">
                            BERANDA
                        </a>
                    </li>

                    <li>
                        <a class="nav-link @if ($page == 'aset') underline @endif" href="/asset">
                            ASET
                        </a>
                    </li>

                    <li>
                        <a class="nav-link @if ($page == 'tentang-kami') underline @endif" href="/tentang-kami">
                            TENTANG KAMI
                        </a>
                    </li>

                    <li>
                        <a class="nav-link @if ($page == 'panduan') underline @endif" href="/panduan">
                            PANDUAN
                        </a>
                    </li>

                    <li>
                        <a class="nav-link @if ($page == 'hubungi-kami') underline @endif" href="/hubungi-kami">
                            HUBUNGI KAMI
                        </a>
                    </li>
                </ul>

            </div>

            <div class="flex items-center gap-4">
                @guest
                    <div class="lg:gap-4 hidden lg:flex">
                        <a class="gold-btn" href="/login">
                            Login
                        </a>

                        <a class="white-btn" href="/register">
                            Daftar
                        </a>
                    </div>
                @endguest

                @auth
                    <div class="relative text-cGold hidden lg:block">
                        <div class="flex justify-center items-center overflow-hidden gap-2 cursor-pointer hover:text-cGold/75"
                            onclick="openProfileWeb()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>

                            <span class="py-2 truncate max-w-[120px] font-medium text-base">
                                {{ Auth::user()->name }}
                            </span>


                            <button id="profile-web-arrow" class="h-full transition">
                                <span class="sr-only">Menu</span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                        </div>

                        <div id="profile-web-links"
                            class="absolute end-0 z-10 mt-2 w-56 divide-y divide-cGold border border-cGold bg-cWhite rounded-lg text-base hidden"
                            role="menu">
                            <div class="p-2">
                                <a href="#"
                                    class="flex items-center w-full  gap-2 px-4 py-2 hover:bg-cLightGrey rounded-lg"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                    </svg>
                                    Pengaturan Akun
                                </a>
                            </div>

                            <div class="p-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-red-700 hover:bg-red-50"
                                        role="menuitem">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>

                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                <button class="block rounded bg-cGold p-2.5 text-cWhite transition hover:text-cWhite lg:hidden"
                    onclick="toggleNavbar()">
                    <span class="sr-only">Toggle menu</span>
                    <div class="h-5 w-5 relative">
                        <span id="nav-icon-top"
                            class="w-5 h-[0.125rem] bg-cWhite rounded-full absolute inset-x-0 mx-auto top-0.5 transition"></span>
                        <span id="nav-icon-mid"
                            class="w-5 h-[0.125rem] bg-cWhite rounded-full absolute inset-0 m-auto transition"></span>
                        <span id="nav-icon-bottom"
                            class="w-5 h-[0.125rem] bg-cWhite rounded-full absolute inset-x-0 mx-auto bottom-0.5 transition"></span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Links --}}
    <div id="mobile-nav-links" class="bg-cWhite hidden">
        <a class="c-container py-3 block border-b-2 border-cGold nav-link @if ($page == 'beranda') underline @endif"
            href="/">
            BERANDA
        </a>

        <a class="c-container py-3 block border-b-2 border-cGold nav-link @if ($page == 'aset') underline @endif"
            href="/">
            ASET
        </a>

        <a class="c-container py-3 block border-b-2 border-cGold nav-link @if ($page == 'tentang-kami') underline @endif"
            href="/">
            TENTANG KAMI
        </a>

        <a class="c-container py-3 block border-b-2 border-cGold nav-link @if ($page == 'panduan') underline @endif"
            href="/">
            PANDUAN
        </a>

        <a class="c-container py-3 block border-b-2 border-cGold nav-link @if ($page == 'hubungi-kami') underline @endif"
            href="/">
            HUBUNGI KAMI
        </a>

        <div class="c-container py-3 flex border-b-2 border-cGold gap-2">
            <a class="gold-btn" href="/">
                Masuk
            </a>

            <a class="white-btn" href="/">
                Daftar
            </a>

            {{-- Profile --}}
            {{-- <div class="relative text-cGold">
                <div class="flex justify-center items-center overflow-hidden gap-2 cursor-pointer hover:text-cGold/75"
                    onclick="openProfileMobile()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>

                    <span class="py-2 truncate max-w-[160px] font-medium text-base">
                        Christopher Tessy
                    </span>

                    <button id="profile-mobile-arrow" class="h-full transition">
                        <span class="sr-only">Menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div id="profile-mobile-links"
                    class="absolute start-0 z-10 mt-2 w-56 divide-y divide-cGold border border-cGold bg-cWhite rounded-lg text-base hidden"
                    role="menu">
                    <div class="p-2">
                        <a href="#"
                            class="flex items-center w-full  gap-2 px-4 py-2 hover:bg-cLightGrey rounded-lg"
                            role="menuitem">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-gear" viewBox="0 0 16 16">
                                <path
                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                <path
                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                            </svg>
                            Pengaturan Akun
                        </a>
                    </div>

                    <div class="p-2">
                        <form method="POST" action="#">
                            <button type="submit"
                                class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-red-700 hover:bg-red-50"
                                role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd"
                                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg>

                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</nav>
