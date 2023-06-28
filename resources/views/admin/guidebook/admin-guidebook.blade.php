@extends('template.admin-template')

@section('head')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="guidebook" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Admin Guidebook</h1>

            <iframe src="{{ asset('assets/admin/Admin Guidebook.pdf') }}?t={{ env('VERSION_TIME') }}"
                class="w-full h-[800px]"></iframe>

            <a href="{{ asset('assets/admin/Admin Guidebook.pdf') }}?t={{ env('VERSION_TIME') }}" download
                class="gold-btn gap-2 w-fit self-end">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Unduh Panduan
            </a>
        </div>
    </div>

    <script src="{{ asset('js/delete-modal.js') }}"></script>
@endsection
