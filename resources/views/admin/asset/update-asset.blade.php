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
                    @foreach ($asset as $a)
                        {{-- <option value="{{ $a->seller }}"></option> --}}
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
