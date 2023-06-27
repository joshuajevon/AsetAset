@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-announcements" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('announcement') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit Announcement</h1>

            <form
                class="w-full bg-cWhite p-8 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6"
                action="{{ route('update-announcement', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="w-full">
                    <x-input-label for="announcement-title" :value="__('Judul')" />
                    <x-text-input type="text" id="announcement-title" class="mt-1 w-full"
                        placeholder="Masukkan judul announcement" name="title" value="{{ $announcement->title }}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="announcement-desc" :value="__('Deskripsi')" />
                    <x-text-input type="text" id="announcement-desc" class="mt-1 w-full"
                        placeholder="Masukkan deskripsi pengumuman" name="description"
                        value="{{ $announcement->description }}" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="announcement-image" :value="__('File')" />
                    <img src="{{ asset('storage/asset/announcement/' . $announcement->file) }}" style="width:300px"
                        alt="">
                    <input type="file" class="mt-1 w-full form-control @error('file') is-invalid @enderror"
                        id="announcement-image" name="file" value="{{ $announcement->file }}">
                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="announcement-date" :value="__('Date')" />
                    <x-text-input type="date" id="announcement-date" class="mt-1 w-full"
                        placeholder="Masukkan deskripsi pengumuman" name="date" value="{{ $announcement->date }}" />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="announcement-type" :value="__('Jenis')" />
                    <select class="mt-1 w-full rounded-md p-4 cursor-pointer @error('type') is-invalid @enderror"
                        id="announcement-type" name="type" value="{{ old('type') }}"
                        aria-label="Default select example" name="type">
                        <option value="" selected disabled>-- Pilih Tipe --</option>
                        <option value="PKPU" @if ($announcement->type == 'PKPU') selected @endif>PKPU</option>
                        <option value="Pailit" @if ($announcement->type == 'Pailit') selected @endif>Pailit</option>
                        <option value="Others" @if ($announcement->type == 'Others') selected @endif>Others</option>
                    </select>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <button type="submit" class="gold-btn px-12">Submit</button>
            </form>
        </div>
    </div>
@endsection
