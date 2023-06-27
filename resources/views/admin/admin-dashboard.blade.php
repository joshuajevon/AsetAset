@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="dashboard" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Dashboard</h1>

            <div class="grid grid-cols-3 gap-16">
                <a href="{{ route('user') }}"
                    class="group hover:bg-cGold flex flex-col bg-cDarkGrey p-4 gap-6 shadow-[0px_4px_4px_rgba(0,0,0,0.25)] hover:text-cWhite">
                    <p class="text-xl mr-8">Manage Users</p>
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-12 h-12 text-cGold group-hover:text-cWhite">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        <p class="font-bold text-3xl">{{ $user_count }}</p>
                    </div>
                </a>

                <a href="{{ route('seller') }}"
                    class="group hover:bg-cGold flex flex-col bg-cDarkGrey p-4 gap-6 shadow-[0px_4px_4px_rgba(0,0,0,0.25)] hover:text-cWhite">
                    <p class="text-xl mr-8">Manage Sellers</p>
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-12 h-12 text-cGold group-hover:text-cWhite">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>
                        <p class="font-bold text-3xl">{{ $seller_count }}</p>
                    </div>
                </a>

                <a href="{{ route('owner') }}"
                    class="group hover:bg-cGold flex flex-col bg-cDarkGrey p-4 gap-6 shadow-[0px_4px_4px_rgba(0,0,0,0.25)] hover:text-cWhite">
                    <p class="text-xl mr-8">Manage Owners</p>
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-12 h-12 text-cGold group-hover:text-cWhite">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                        <p class="font-bold text-3xl">{{ $owner_count }}</p>
                    </div>
                </a>

                <a href="{{ route('asset') }}"
                    class="group hover:bg-cGold flex flex-col bg-cDarkGrey p-4 gap-6 shadow-[0px_4px_4px_rgba(0,0,0,0.25)] hover:text-cWhite">
                    <p class="text-xl mr-8">Manage Assets</p>
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-12 h-12 text-cGold group-hover:text-cWhite">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                        </svg>
                        <p class="font-bold text-3xl">{{ $asset_count }}</p>
                    </div>
                </a>

                <a href="{{ route('carousel') }}"
                    class="group hover:bg-cGold flex flex-col bg-cDarkGrey p-4 gap-6 shadow-[0px_4px_4px_rgba(0,0,0,0.25)] hover:text-cWhite">
                    <p class="text-xl mr-8">Manage Slideshows</p>
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-12 h-12 text-cGold group-hover:text-cWhite">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                        <p class="font-bold text-3xl">{{ $carousel_count }}</p>
                    </div>
                </a>

                <a href="{{ route('announcement') }}"
                    class="group hover:bg-cGold flex flex-col bg-cDarkGrey p-4 gap-6 shadow-[0px_4px_4px_rgba(0,0,0,0.25)] hover:text-cWhite">
                    <p class="text-xl mr-8">Manage Announcements</p>
                    <div class="flex justify-between items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-12 h-12 text-cGold group-hover:text-cWhite">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>
                        <p class="font-bold text-3xl">{{ $announcement_count }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
