@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        Edit carousel
    </h1>

    <div class="m-5">
        <form action="{{route('update-carousel', $carousel->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <img src="{{ asset('storage/asset/slideshow/'.$carousel->slideshow) }}" style="width:300px" alt="">
            <div>
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control @error('slideshow') is-invalid @enderror" id="" name="slideshow" value="{{$carousel->slideshow}}">
            </div>

            @error('slideshow')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
