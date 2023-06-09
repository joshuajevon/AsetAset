@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-sellers" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('seller') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Add Seller</h1>

            <form
                class="w-full bg-cWhite p-8 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6"
                action="{{ route('store-seller') }}" method="POST">
                @csrf
                <div class="w-full">
                    <x-input-label for="seller-name" :value="__('Nama')" />
                    <x-text-input type="text" id="seller-name" class="mt-1 w-full" placeholder="Masukkan nama seller" name="seller_name"
                        value="{{ old('seller_name') }}" />
                    <x-input-error :messages="$errors->get('seller_name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="seller-address" :value="__('Alamat')" />
                    <x-text-input type="text" id="seller-address" class="mt-1 w-full" placeholder="Masukkan alamat seller"
                        name="seller_address" value="{{ old('seller_address') }}" />
                    <x-input-error :messages="$errors->get('seller_address')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="seller-phone" :value="__('Nomor Handphone')" />
                    <x-text-input type="text" id="seller-phone" class="mt-1 w-full" placeholder="Masukkan nomor handphone seller"
                        name="seller_phone" value="{{ old('seller_phone') }}" />
                    <x-input-error :messages="$errors->get('seller_phone')" class="mt-2" />
                </div>
                <button type="submit" class="gold-btn px-12">Submit</button>
            </form>
        </div>
    </div>
@endsection
