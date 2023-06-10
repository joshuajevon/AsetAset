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
        </div>
        <h1>Total Users:</h1>
        {{ $user_count }}

        <h1>Total Asset:</h1>
        {{ $owner_count }}

        <h1>Total Seller:</h1>
        {{ $seller_count }}

        <h1>Total Asset:</h1>
        {{ $asset_count }}

        <h1>Total Slideshow:</h1>
        {{ $carousel_count }}

    </div>
@endsection
