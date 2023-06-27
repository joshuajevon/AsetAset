<nav id="navbar" class="text-base fixed w-full z-50">
    <div class="c-container bg-cBlack mx-auto flex h-20 w-full items-center gap-8 ">
        <a class="block text-cGold mr-8" href="/">
            <img class="h-4" src="{{ asset('assets/logo/asetaset-full.png') }}" alt="logo">
        </a>

        <div id="web-nav-links" class="flex flex-1 items-center justify-end lg:justify-between">
            <div aria-label="Site Nav" class="hidden lg:block gap-6">
                <ul class="flex justify-center items-center gap-6 w-full">
                    <li>
                        <a class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold before:transition hover:before:scale-100 @if ($page == 'beranda') before:scale-x-100 @endif"
                            href="/">
                            BERANDA
                        </a>
                    </li>

                    <li>
                        <a class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold before:transition hover:before:scale-100 @if ($page == 'aset') before:scale-x-100 @endif"
                            href="/asset">
                            ASET
                        </a>
                    </li>

                    <li>
                        <a class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold before:transition hover:before:scale-100 @if ($page == 'tentang-kami') before:scale-x-100 @endif"
                            href="/tentang-kami">
                            TENTANG KAMI
                        </a>
                    </li>

                    <li>
                        <a class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold before:transition hover:before:scale-100 @if ($page == 'panduan') before:scale-x-100 @endif"
                            href="/panduan">
                            PANDUAN
                        </a>
                    </li>

                    <li>
                        <a class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold before:transition hover:before:scale-100 @if ($page == 'hubungi-kami') before:scale-x-100 @endif"
                            href="/hubungi-kami">
                            HUBUNGI KAMI
                        </a>
                    </li>

                    <li>
                        <a class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold before:transition hover:before:scale-100 @if ($page == 'pengumuman') before:scale-x-100 @endif"
                            href="/pengumuman">
                            PENGUMUMAN
                        </a>
                    </li>
                </ul>

            </div>

            <div class="flex items-center gap-4">
                @guest
                    <div class="lg:gap-4 hidden lg:flex">
                        <a class="gold-btn" href="/login">
                            Masuk
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

                            <span class="py-2 truncate max-w-[100px] font-medium text-base">
                                {{ Auth::user()->nickname }}
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
                                <a href="/dashboard"
                                    class="flex items-center w-full  gap-2 px-4 py-2 hover:bg-cLightGrey rounded-lg"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                    </svg>

                                    Dashboard
                                </a>
                            </div>

                            <div class="p-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-red-700 hover:bg-red-50"
                                        role="menuitem">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
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
        <a href="/" class="c-container block border-b-[1px] border-cGold py-3">
            <span
                class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold @if ($page == 'beranda') before:scale-x-100 @endif">
                BERANDA
            </span>
        </a>

        <a href="/asset" class="c-container block border-b-[1px] border-cGold py-3">
            <span
                class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold @if ($page == 'aset') before:scale-x-100 @endif">
                ASET
            </span>
        </a>

        <a href="/tentang-kami" class="c-container block border-b-[1px] border-cGold py-3">
            <span
                class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold @if ($page == 'tentang-kami') before:scale-x-100 @endif">
                TENTANG KAMI
            </span>
        </a>

        <a href="/panduan" class="c-container block border-b-[1px] border-cGold py-3">
            <span
                class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold @if ($page == 'panduan') before:scale-x-100 @endif">
                PANDUAN
            </span>
        </a>

        <a href="/hubungi-kami" class="c-container block border-b-[1px] border-cGold py-3">
            <span
                class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold @if ($page == 'hubungi-kami') before:scale-x-100 @endif">
                HUBUNGI KAMI
            </span>
        </a>

        <a href="/pengumuman" class="c-container block border-b-[1px] border-cGold py-3">
            <span
                class="nav-link relative before:absolute before:-bottom-1 before:h-0.5 before:w-full before:origin-left before:scale-x-0 before:bg-cGold @if ($page == 'pengumuman') before:scale-x-100 @endif">
                PENGUMUMAN
            </span>
        </a>

        <div class="c-container py-3 flex border-b-[1px] border-cGold gap-2">
            @guest
                <a class="gold-btn" href="/login">
                    Masuk
                </a>

                <a class="white-btn" href="/register">
                    Daftar
                </a>
            @endguest

            @auth
                <div class="relative text-cGold">
                    <div class="flex justify-center items-center overflow-hidden gap-2 cursor-pointer hover:text-cGold/75"
                        onclick="openProfileMobile()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>

                        <span class="py-2 truncate max-w-[100px] font-medium text-base">
                            {{ Auth::user()->nickname }}
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
                        class="absolute z-10 mt-2 w-56 divide-y divide-cGold border border-cGold bg-cWhite rounded-lg text-base hidden"
                        role="menu">
                        <div class="p-2">
                            <a href="/dashboard"
                                class="flex items-center w-full  gap-2 px-4 py-2 hover:bg-cLightGrey rounded-lg"
                                role="menuitem">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                </svg>

                                Dashboard
                            </a>
                        </div>

                        <div class="p-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-red-700 hover:bg-red-50"
                                    role="menuitem">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>

                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
