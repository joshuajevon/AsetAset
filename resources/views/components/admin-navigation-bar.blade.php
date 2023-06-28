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

            <a href="/admin"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'dashboard') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>

                <span class="hidden lg:inline text-base font-medium"> Dashboard </span>
            </a>

            <a href="{{ route('user') }}"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'manage-users') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                <span class="hidden lg:inline text-base font-medium"> Manage Users </span>
            </a>

            <a href="{{ route('seller') }}"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'manage-sellers') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>

                <span class="hidden lg:inline text-base font-medium"> Manage Sellers </span>
            </a>

            <a href="{{ route('owner') }}"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'manage-owners') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>
                <span class="hidden lg:inline text-base font-medium"> Manage Owners </span>
            </a>

            <a href="{{ route('asset') }}"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'manage-assets') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                </svg>
                <span class="hidden lg:inline text-base font-medium"> Manage Assets </span>
            </a>

            <a href="{{ route('carousel') }}"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'manage-slideshows') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                </svg>
                <span class="hidden lg:inline text-base font-medium"> Manage Slideshows </span>
            </a>

            <a href="{{ route('announcement') }}"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'manage-announcements') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46" />
                </svg>

                <span class="hidden lg:inline text-base font-medium"> Manage Announcements </span>
            </a>

            <a href="{{route('admin-guidebook')}}"  rel="noopener noreferrer"
                class="flex items-center gap-2.5 rounded-lg px-2 lg:px-4 py-2 lg:py-3 w-fit lg:w-full @if ($page == 'guidebook') bg-gray-100 text-cGold @else text-cWhite hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] @endif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>

                <span class="hidden lg:inline text-base font-medium"> Admin Guidebook </span>
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
