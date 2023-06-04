@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <div class="m-5">
        <h1 class="text-center">Add carousel</h1>
        <form action="{{route('store-carousel')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control @error('slideshow') is-invalid @enderror" id="" name="slideshow" value="{{old('slideshow')}}">
            </div>

            @error('slideshow')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
