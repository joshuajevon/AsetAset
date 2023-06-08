@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-slideshows" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit Slideshow</h1>

            <form action="{{ route('update-carousel', $carousel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div>
                    <label for="" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id=""
                        name="title" value="{{ $carousel->title }}">
                </div>

                @error('title')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <img src="{{ asset('storage/asset/slideshow/' . $carousel->slideshow) }}" style="width:300px"
                    alt="">
                <div>
                    <label for="" class="form-label">Image</label>
                    <input type="file" class="form-control @error('slideshow') is-invalid @enderror" id=""
                        name="slideshow" value="{{ $carousel->slideshow }}">
                </div>

                @error('slideshow')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <div>
                    <label for="" class="form-label">Link (optional)</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" id=""
                        name="link" value="{{ $carousel->link }}">
                </div>

                @error('link')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
