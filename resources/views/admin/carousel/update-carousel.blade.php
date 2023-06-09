@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-slideshows" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('carousel') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit Slideshow</h1>

            <form
                class="w-full bg-cWhite p-8 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6"
                action="{{ route('update-carousel', $carousel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="w-full">
                    <x-input-label for="slideshow-title" :value="__('Judul')" />
                    <x-text-input type="text" id="slideshow-title" class="mt-1 w-full"
                        placeholder="Masukkan judul slideshow" name="title" value="{{ $carousel->title }}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="slideshow-image" :value="__('Gambar')" />
                    <img src="{{ asset('storage/asset/slideshow/' . $carousel->slideshow) }}" style="width:300px"
                        alt="">
                    <input type="file" class="mt-1 w-full form-control @error('slideshow') is-invalid @enderror"
                        id="slideshow-image" name="slideshow" value="{{ $carousel->slideshow }}">
                    <x-input-error :messages="$errors->get('slideshow')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="slideshow-link" :value="__('Link (Opsional)')" />
                    <x-text-input type="text" id="slideshow-link" class="mt-1 w-full"
                        placeholder="Masukkan link slideshow" name="link" value="{{ $carousel->link }}" />
                    <x-input-error :messages="$errors->get('link')" class="mt-2" />
                </div>

                <button type="submit" class="gold-btn px-12">Submit</button>
            </form>
        </div>
    </div>
@endsection
