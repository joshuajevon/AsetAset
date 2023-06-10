@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-assets" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('asset') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit Asset</h1>

            <form
                class="w-full bg-cWhite p-8 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6"
                action="{{ route('update-asset', $asset->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="w-full">
                    <x-input-label for="asset-name" :value="__('Nama')" />
                    <x-text-input type="text" id="asset-name" class="mt-1 w-full" placeholder="Masukkan nama asset"
                        name="name" value="{{ $asset->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-category" :value="__('Category')" />
                    <select class="mt-1 w-full rounded-md p-4 cursor-pointer @error('category') is-invalid @enderror"
                        id="asset-category" name="category" value="{{ old('category') }}"
                        aria-label="Default select example" name="category">
                        <option value="" disabled>-- Pilih Categori --</option>
                        <option value="Rumah" @if ($asset->category == 'Rumah') selected @endif>Rumah</option>
                        <option value="Gedung" @if ($asset->category == 'Gedung') selected @endif>Gedung</option>
                        <option value="Gudang" @if ($asset->category == 'Gudang') selected @endif>Gudang</option>
                        <option value="Apartemen" @if ($asset->category == 'Apartemen') selected @endif>Apartemen</option>
                        <option value="Tanah" @if ($asset->category == 'Tanah') selected @endif>Tanah</option>
                        <option value="Barang" @if ($asset->category == 'Barang') selected @endif>Barang</option>
                        <option value="Kendaraan" @if ($asset->category == 'Kendaraan') selected @endif>Kendaraan</option>
                        <option value="Alat berat" @if ($asset->category == 'Alat Berat') selected @endif>Alat berat</option>
                        <option value="Lain-lain" @if ($asset->category == 'Lain-lain') selected @endif>Lain-lain</option>
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-category" :value="__('Provinsi')" />
                    <select  class="mt-1 w-full rounded-md p-4 cursor-pointer" name="provinces" id="provinsi">
                        <option value="" disabled selected>--Pilih Provinsi--</option>
                        @foreach ($provinces as $province)
                        <option value="{{ $province }}"
                            {{ $asset->province == $province ? 'selected' : '' }}>
                                {{ $province }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full">
                    <x-input-label for="asset-category" :value="__('Kota')" />
                    <select class="mt-1 w-full rounded-md p-4 cursor-pointer" name="cities" id="kota">
                        <option value="" disabled selected>--Pilih Kota--</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city }}"
                            {{ $asset->city == $city ? 'selected' : '' }}>
                                {{ $city }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full">
                    <x-input-label for="asset-price" :value="__('Nilai')" />
                    <x-text-input type="number" id="asset-price" class="mt-1 w-full" placeholder="Masukkan nilai asset"
                        name="price" value="{{ $asset->price }}" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-seller" :value="__('Penjual')" />
                    <select id="asset-seller" class="mt-1 w-full rounded-md p-4 cursor-pointer" name="seller_name">
                        <option value="" disabled>-- Pilih Penjual --</option>
                        @foreach ($sellers as $seller)
                            <option value="{{ $seller->id }}" @if ($asset->seller_id == $seller->id) selected @endif>
                                {{ $seller->seller_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('seller_name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-owner" :value="__('Pemilik')" />
                    <select id="asset-owner" class="mt-1 w-full rounded-md p-4 cursor-pointer" name="owner_name">
                        <option value="" disabled>-- Pilih Pemilik --</option>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}" @if ($asset->owner_id == $owner->id) selected @endif>
                                {{ $owner->owner_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('owner_name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-desc" :value="__('Deskripsi')" />
                    <x-text-input type="text" id="asset-desc" class="mt-1 w-full" placeholder="Masukkan deskripsi asset"
                        name="description" value="{{ $asset->description }}" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-status" :value="__('Status')" />
                    <x-text-input type="text" id="asset-status" class="mt-1 w-full" placeholder="Masukkan status asset"
                        name="status" value="{{ $asset->status }}" />
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label :value="__('Lampiran')" />
                    <div class="mt-1 w-full">
                        <h1>{{ $asset->attachment1 }}</h1>
                        <label for="total_attachments">Attachment 1:</label>
                        <input type="file" name="attachment1" value="{{ $asset->attachment1 }}">
                    </div>

                    <div class="mt-1 w-full">
                        <h1>{{ $asset->attachment2 }}</h1>
                        <label for="total_attachments">Attachment 2:</label>
                        <input type="file" name="attachment2" value="{{ $asset->attachment2 }}">
                    </div>

                    <div class="mt-1 w-full">
                        <h1>{{ $asset->attachment3 }}</h1>
                        <label for="total_attachments">Attachment 3:</label>
                        <input type="file" name="attachment3" value="{{ $asset->attachment3 }}">
                    </div>

                    <div class="mt-1 w-full">
                        <h1>{{ $asset->attachment4 }}</h1>
                        <label for="total_attachments">Attachment 4:</label>
                        <input type="file" name="attachment4" value="{{ $asset->attachment4 }}">
                    </div>

                    <div class="mt-1 w-full">
                        <h1>{{ $asset->attachment5 }}</h1>
                        <label for="total_attachments">Attachment 5:</label>
                        <input type="file" name="attachment5" value="{{ $asset->attachment5 }}">
                    </div>
                </div>

                <div class="w-full">
                    <x-input-label :value="__('Gambar')" />
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="mt-1 w-full">
                            <img src="{{ asset('storage/asset/image' . $i . '/' . $asset->{'image' . $i}) }}"
                                style="width:300px" alt="">
                            <label for="image{{ $i }}">Image {{ $i }}:</label>
                            <input type="file" name="image{{ $i }}" value="{{ $asset->{'image' . $i} }}">
                        </div>
                    @endfor
                </div>

                <button type="submit" class="gold-btn px-12">Submit</button>
            </form>
        </div>
    </div>
@endsection
