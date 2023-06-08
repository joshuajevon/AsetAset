@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-owners" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit Owner</h1>

            <div class="m-5">
                <form action="{{route('update-owner', $owner->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="" class="form-label">owner Name</label>
                        <input type="text" class="form-control @error('owner_name') is-invalid @enderror" id="" name="owner_name" value="{{$owner->owner_name}}">
                    </div>

                    @error('owner_name')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                    @enderror

                    <div>
                        <label for="" class="form-label">owner Address</label>
                        <input type="text" class="form-control @error('owner_address') is-invalid @enderror" id="" name="owner_address" value="{{$owner->owner_address}}">
                    </div>

                    @error('owner_address')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                    @enderror

                    <div>
                        <label for="" class="form-label">owner Phone</label>
                        <input type="number" class="form-control @error('owner_phone') is-invalid @enderror" id="" name="owner_phone" value="{{$owner->owner_phone}}">
                    </div>

                    @error('owner_phone')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
