@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <div class="m-5">
        <h1 class="text-center">Add Seller</h1>
        <form action="{{route('store-seller')}}" method="POST">
            @csrf
            <div>
                <label for="" class="form-label">Seller Name</label>
                <input type="text" class="form-control @error('seller_name') is-invalid @enderror" id="" name="seller_name" value="{{old('seller_name')}}">
            </div>

            @error('seller_name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Seller Address</label>
                <input type="text" class="form-control @error('seller_address') is-invalid @enderror" id="" name="seller_address" value="{{old('seller_address')}}">
            </div>

            @error('seller_address')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Seller Phone</label>
                <input type="number" class="form-control @error('seller_phone') is-invalid @enderror" id="" name="seller_phone" value="{{old('seller_phone')}}">
            </div>

            @error('seller_phone')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
