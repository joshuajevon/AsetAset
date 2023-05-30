@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        Add Asset
    </h1>

    <div class="m-5">
        <h1 class="text-center">Add Asset</h1>
        <form action="{{route('store-asset')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="" class="form-label">Asset Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" name="name" value="{{old('name')}}">
            </div>

            @error('name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Category</label>
                <select class="form-select @error('category') is-invalid @enderror" id="" name="category" value="{{old('category')}}" aria-label="Default select example" name="category">
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
            </div>

            @error('category')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Province</label>
                <input type="text" class="form-control @error('province') is-invalid @enderror" id="" name="province" value="{{old('province')}}">
            </div>

            @error('province')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">City</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="" name="city" value="{{old('city')}}">
            </div>

            @error('city')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="" name="price" value="{{old('price')}}">
            </div>

            @error('price')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Seller</label>
                <select class="form-select" aria-label="Default select example" name="seller_name">
                    @foreach ($sellers as $seller)
                        <option value="{{ $seller->id }}">{{ $seller->seller_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Owner</label>
                <select class="form-select" aria-label="Default select example" name="owner_name">
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->owner_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="" class="form-label">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}"></textarea>
            </div>

            @error('description')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="" name="status" value="{{old('status')}}">
            </div>

            @error('status')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <label for="total_attachments">Jumlah Attachment:</label>
            <input type="number" name="total_attachments" id="total_attachments">

            <div id="attachment_container"></div>

            <label for="total_images">Jumlah Image:</label>
            <input type="number" name="total_images" id="total_images">

            <div id="image_container"></div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('total_attachments').addEventListener('change', function() {
            var totalAttachments = parseInt(this.value);
            totalAttachments = Math.min(totalAttachments, 5);

            var attachmentContainer = document.getElementById('attachment_container');
            attachmentContainer.innerHTML = ''; // Menghapus elemen sebelumnya

            for (var i = 1; i <= totalAttachments; i++) {
                var label = document.createElement('label');
                label.setAttribute('for', 'attachment' + i);
                label.innerText = 'Attachment ' + i + ':';

                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('name', 'attachment' + i);
                input.setAttribute('id', 'attachment' + i);
                input.classList.add('form-control');

                var errorContainer = document.createElement('div');
                errorContainer.classList.add('alert', 'alert-danger');
                errorContainer.setAttribute('role', 'alert');
                errorContainer.setAttribute('id', 'error_attachment' + i);

                attachmentContainer.appendChild(label);
                attachmentContainer.appendChild(input);
                attachmentContainer.appendChild(errorContainer);
            }
        });

        document.getElementById('total_images').addEventListener('change', function() {
            var totalImages = parseInt(this.value);
            totalImages = Math.min(totalImages, 5);

            var imageContainer = document.getElementById('image_container');
            imageContainer.innerHTML = ''; // Menghapus elemen sebelumnya

            for (var i = 1; i <= totalImages; i++) {
                var label = document.createElement('label');
                label.setAttribute('for', 'image' + i);
                label.innerText = 'Image ' + i + ':';

                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('name', 'image' + i);
                input.setAttribute('id', 'image' + i);
                input.classList.add('form-control');

                var errorContainer = document.createElement('div');
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
