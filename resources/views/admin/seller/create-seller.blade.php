@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-sellers" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Add Seller</h1>

            <form action="{{ route('store-seller') }}" method="POST">
                @csrf
                <div>
                    <label for="" class="form-label">Seller Name</label>
                    <input type="text" class="form-control @error('seller_name') is-invalid @enderror" id=""
                        name="seller_name" value="{{ old('seller_name') }}">
                </div>

                @error('seller_name')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <div>
                    <label for="" class="form-label">Seller Address</label>
                    <input type="text" class="form-control @error('seller_address') is-invalid @enderror" id=""
                        name="seller_address" value="{{ old('seller_address') }}">
                </div>

                @error('seller_address')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <div>
                    <label for="" class="form-label">Seller Phone</label>
                    <input type="number" class="form-control @error('seller_phone') is-invalid @enderror" id=""
                        name="seller_phone" value="{{ old('seller_phone') }}">
                </div>

                @error('seller_phone')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
