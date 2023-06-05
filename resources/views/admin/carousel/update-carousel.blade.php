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

            <div>
                <label for="" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="" name="title" value="{{$carousel->title}}">
            </div>

            @error('title')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <img src="{{ asset('storage/asset/slideshow/'.$carousel->slideshow) }}" style="width:300px" alt="">
            <div>
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control @error('slideshow') is-invalid @enderror" id="" name="slideshow" value="{{$carousel->slideshow}}">
            </div>

            @error('slideshow')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div>
                <label for="" class="form-label">Link (optional)</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="" name="link" value="{{$carousel->link}}">
            </div>

            @error('link')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
