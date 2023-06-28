@extends('template.admin-template')

@section('head')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-owners" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Admin Guidebook</h1>
        </div>
    </div>

    <script src="{{ asset('js/delete-modal.js') }}"></script>
@endsection
