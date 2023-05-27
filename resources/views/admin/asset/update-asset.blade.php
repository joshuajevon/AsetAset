@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-b$asset->nderline">
        Edit Asset
    </h1>

    <div class="m-5">
        <h1 class="text-center">edit Asset</h1>
        <form action="{{route('update-asset', $asset->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <label for="" class="form-label">Asset Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="" name="name" value="{{$asset->name}}">
            </div>

            @error('name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Category</label>
                <select class="form-select @error('category') is-invalid @enderror" id="" name="category" value="{{$asset->category}}" aria-label="Default select example" name="category">
                    <option value="Rumah" @if ($asset->category == "Rumah") selected @endif>Rumah</option>
                    <option value="Gedung" @if ($asset->category == "Gedung") selected @endif>Gedung</option>
                    <option value="Gudang" @if ($asset->category == "Gudang") selected @endif>Gudang</option>
                    <option value="Apartemen" @if ($asset->category == "Apartemen") selected @endif>Apartemen</option>
                    <option value="Tanah" @if ($asset->category == "Tanah") selected @endif>Tanah</option>
                    <option value="Barang" @if ($asset->category == "Barang") selected @endif>Barang</option>
                    <option value="Kendaraan" @if ($asset->category == "Kendaraan") selected @endif>Kendaraan</option>
                    <option value="Alat berat" @if ($asset->category == "Alat Berat") selected @endif>Alat berat</option>
                    <option value="Lain-lain" @if ($asset->category == "Lain-lain") selected @endif>Lain-lain</option>
                </select>
            </div>

            @error('category')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Province</label>
                <input type="text" class="form-control @error('province') is-invalid @enderror" id="" name="province" value="{{$asset->province}}">
            </div>

            @error('province')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">City</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="" name="city" value="{{$asset->city}}">
            </div>

            @error('city')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="" name="price" value="{{$asset->price}}">
            </div>

            @error('price')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Seller</label>
                <select class="form-select" aria-label="Default select example" name="seller_name">
                    @foreach ($sellers as $seller)
                        <option value="{{$seller->id}}" @if ($asset->seller_id == $seller->id)
                            selected
                        @endif>{{$seller->seller_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Owner</label>
                <select class="form-select" aria-label="Default select example" name="seller_name">
                    @foreach ($owners as $owner)
                        <option value="{{$owner->id}}" @if ($asset->owner_id == $owner->id)
                            selected
                        @endif>{{$owner->owner_name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="" class="form-label">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" >{{$asset->description}}</textarea>
            </div>

            @error('description')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Attachment</label>
                <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="" name="attachment" value="{{$asset->attachment}}">
            </div>

            @error('attachment')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="" name="image" value="{{$asset->image}}">
            </div>

            @error('image')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
