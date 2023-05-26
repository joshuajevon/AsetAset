@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        Edit seller
    </h1>

    <div class="m-5">
        <form action="{{route('update-seller', $seller->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div>
                <label for="" class="form-label">Seller Name</label>
                <input type="text" class="form-control @error('seller_name') is-invalid @enderror" id="" name="seller_name" value="{{$seller->seller_name}}">
            </div>

            @error('seller_name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Seller Address</label>
                <input type="text" class="form-control @error('seller_address') is-invalid @enderror" id="" name="seller_address" value="{{$seller->seller_address)}}">
            </div>

            @error('seller_address')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Seller Phone</label>
                <input type="number" class="form-control @error('seller_phone') is-invalid @enderror" id="" name="seller_phone" value="{{$seller->seller_phone}}">
            </div>

            @error('seller_phone')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
