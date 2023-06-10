@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-assets" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('asset') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Add Asset</h1>

            <form
                class="w-full bg-cWhite p-8 shadow-[0px_4.7451px_41.5196px_rgba(41,82,144,0.25)] flex flex-col justify-center items-start gap-6"
                action="{{ route('store-asset') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <x-input-label for="asset-name" :value="__('Nama')" />
                    <x-text-input type="text" id="asset-name" class="mt-1 w-full" placeholder="Masukkan nama asset"
                        name="name" value="{{ old('name') }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-category" :value="__('Category')" />
                    <select class="mt-1 w-full rounded-md p-4 cursor-pointer @error('category') is-invalid @enderror"
                        id="asset-category" name="category" value="{{ old('category') }}"
                        aria-label="Default select example" name="category">
                        <option value="" selected disabled>-- Pilih Categori --</option>
                        <option value="Rumah">Rumah</option>
                        <option value="Gedung">Gedung</option>
                        <option value="Gudang">Gudang</option>
                        <option value="Apartemen">Apartemen</option>
                        <option value="Tanah">Tanah</option>
                        <option value="Barang">Barang</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Alat berat">Alat berat</option>
                        <option value="Lain-lain">Lain-lain</option>
                    </select>
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-category" :value="__('Provinsi')" />
                    <select  class="mt-1 w-full rounded-md p-4 cursor-pointer" name="provinces" id="provinsi">
                        <option value="" disabled selected>--Pilih Provinsi--</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province }}"
                                {{ in_array($province, $selectedProvinces) ? 'selected' : '' }}>
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
                                {{ in_array($city, $selectedCities) ? 'selected' : '' }}>
                                {{ $city }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full">
                    <x-input-label for="asset-price" :value="__('Nilai')" />
                    <x-text-input type="number" id="asset-price" class="mt-1 w-full" placeholder="Masukkan nilai asset"
                        name="price" value="{{ old('price') }}" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-seller" :value="__('Penjual')" />
                    <select id="asset-seller" class="mt-1 w-full rounded-md p-4 cursor-pointer" name="seller_name">
                        <option value="" selected disabled>-- Pilih Penjual --</option>
                        @foreach ($sellers as $seller)
                            <option value="{{ $seller->id }}">{{ $seller->seller_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('seller_name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-owner" :value="__('Pemilik')" />
                    <select id="asset-owner" class="mt-1 w-full rounded-md p-4 cursor-pointer" name="owner_name">
                        <option value="" selected disabled>-- Pilih Pemilik --</option>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->owner_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('owner_name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-desc" :value="__('Deskripsi')" />
                    <x-text-input type="text" id="asset-desc" class="mt-1 w-full" placeholder="Masukkan deskripsi asset"
                        name="description" value="{{ old('description') }}" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="asset-status" :value="__('Status')" />
                    <x-text-input type="text" id="asset-status" class="mt-1 w-full"
                        placeholder="Masukkan status asset" name="status" value="{{ old('status') }}" />
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="total_attachments" :value="__('Jumlah Lampiran')" />
                    <x-text-input type="number" id="total_attachments" class="mt-1 w-full"
                        placeholder="Masukkan jumlah lampiran asset" name="total_attachments"
                        value="{{ old('total_attachments') }}" max="5" />
                    <x-input-error :messages="$errors->get('total_attachments')" class="mt-2" />
                </div>

                <div id="attachment_container" class="hidden"></div>

                <div class="w-full">
                    <x-input-label for="total_images" :value="__('Jumlah Gambar')" />
                    <x-text-input type="number" id="total_images" class="mt-1 w-full"
                        placeholder="Masukkan jumlah gambar asset" name="total_images" value="{{ old('total_images') }}"
                        max="5" />
                    <x-input-error :messages="$errors->get('total_images')" class="mt-2" />
                </div>

                <div id="image_container" class="hidden"></div>

                <button type="submit" class="gold-btn px-12">Submit</button>
            </form>

        </div>
    </div>

    <script>
        document.getElementById('total_attachments').addEventListener('input', function() {
            let totalAttachments = parseInt(this.value);
            totalAttachments = Math.min(totalAttachments, 5);

            let attachmentContainer = document.getElementById('attachment_container');
            attachmentContainer.innerHTML = ''; // Menghapus elemen sebelumnya

            if (totalAttachments <= 0 || totalAttachments == '' || isNaN(totalAttachments)) {
                attachmentContainer.style.display = "none";
                return;
            }

            attachmentContainer.style.display = "block"
            for (let i = 1; i <= totalAttachments; i++) {
                let label = document.createElement('label');
                label.setAttribute('for', 'attachment' + i);
                label.innerText = 'Attachment ' + i + ': ';

                let input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('name', 'attachment' + i);
                input.setAttribute('id', 'attachment' + i);
                input.classList.add('form-control');

                let errorContainer = document.createElement('div');
                errorContainer.classList.add('alert', 'alert-danger');
                errorContainer.setAttribute('role', 'alert');
                errorContainer.setAttribute('id', 'error_attachment' + i);

                attachmentContainer.appendChild(label);
                attachmentContainer.appendChild(input);
                attachmentContainer.appendChild(errorContainer);
            }
        });

        document.getElementById('total_images').addEventListener('input', function() {
            let totalImages = parseInt(this.value);
            totalImages = Math.min(totalImages, 5);

            let imageContainer = document.getElementById('image_container');
            imageContainer.innerHTML = ''; // Menghapus elemen sebelumnya

            if (totalImages <= 0 || totalImages == '' || isNaN(totalImages)) {
                imageContainer.style.display = "none";
                return;
            }

            imageContainer.style.display = "block"
            for (let i = 1; i <= totalImages; i++) {
                let label = document.createElement('label');
                label.setAttribute('for', 'image' + i);
                label.innerText = 'Image ' + i + ': ';

                let input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('name', 'image' + i);
                input.setAttribute('id', 'image' + i);
                input.classList.add('form-control');

                let errorContainer = document.createElement('div');
                errorContainer.classList.add('alert', 'alert-danger');
                errorContainer.setAttribute('role', 'alert');
                errorContainer.setAttribute('id', 'error_image' + i);

                imageContainer.appendChild(label);
                imageContainer.appendChild(input);
                imageContainer.appendChild(errorContainer);
            }
        });
    </script>
@endsection
