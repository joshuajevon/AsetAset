@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <div class="m-5">
        <h1 class="text-center">Add Owner</h1>
        <form action="{{route('store-owner')}}" method="POST">
            @csrf
            <div>
                <label for="" class="form-label">owner Name</label>
                <input type="text" class="form-control @error('owner_name') is-invalid @enderror" id="" name="owner_name" value="{{old('owner_name')}}">
            </div>

            @error('owner_name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">owner Address</label>
                <input type="text" class="form-control @error('owner_address') is-invalid @enderror" id="" name="owner_address" value="{{old('owner_address')}}">
            </div>

            @error('owner_address')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">owner Phone</label>
                <input type="number" class="form-control @error('owner_phone') is-invalid @enderror" id="" name="owner_phone" value="{{old('owner_phone')}}">
            </div>

            @error('owner_phone')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
