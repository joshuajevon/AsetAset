@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-owners" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit Owner</h1>

            <a href="{{ route('owner') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <form class="w-full bg-cWhite p-8 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6" action="{{ route('update-owner', $owner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="w-full">
                    <x-input-label for="owner-name" :value="__('Nama')" />
                    <x-text-input type="text" id="owner-name" class="mt-1 w-full" placeholder="Masukkan nama owner"
                        name="owner_name" value="{{ $owner->owner_name }}" />
                    <x-input-error :messages="$errors->get('owner_name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="owner-address" :value="__('Alamat')" />
                    <x-text-input type="text" id="owner-address" class="mt-1 w-full" placeholder="Masukkan alamat owner"
                        name="owner_address" value="{{ $owner->owner_address }}" />
                    <x-input-error :messages="$errors->get('owner_address')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="owner-phone" :value="__('Nomor Handphone')" />
                    <x-text-input type="text" id="owner-phone" class="mt-1 w-full"
                        placeholder="Masukkan nomor handphone owner" name="owner_phone" value="{{ $owner->owner_phone}}" />
                    <x-input-error :messages="$errors->get('owner_phone')" class="mt-2" />
                </div>

                {{-- <div>
                    <label for="" class="form-label">owner Name</label>
                    <input type="text" class="form-control @error('owner_name') is-invalid @enderror" id=""
                        name="owner_name" value="{{ $owner->owner_name }}">
                </div>

                @error('owner_name')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <div>
                    <label for="" class="form-label">owner Address</label>
                    <input type="text" class="form-control @error('owner_address') is-invalid @enderror" id=""
                        name="owner_address" value="{{ $owner->owner_address }}">
                </div>

                @error('owner_address')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <div>
                    <label for="" class="form-label">owner Phone</label>
                    <input type="number" class="form-control @error('owner_phone') is-invalid @enderror" id=""
                        name="owner_phone" value="{{ $owner->owner_phone }}">
                </div>

                @error('owner_phone')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror --}}

                <button type="submit" class="gold-btn px-12">Submit</button>
            </form>
        </div>
    </div>
@endsection
