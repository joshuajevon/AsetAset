@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-users" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Edit User</h1>

            <div class="m-5">
                <form action="{{ route('update-user', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="" class="form-label">user Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id=""
                            name="name" value="{{ $user->name }}">
                    </div>

                    @error('name')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror

                    <div>
                        <label for="" class="form-label">nick Name</label>
                        <input type="text" class="form-control @error('nickname') is-invalid @enderror" id=""
                            name="nickname" value="{{ $user->nickname }}">
                    </div>

                    @error('nickname')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror

                    <div>
                        <label for="" class="form-label">email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id=""
                            name="email" value="{{ $user->email }}">
                    </div>

                    @error('email')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror

                    <div>
                        <label for="" class="form-label">phone number</label>
                        <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                            id="" name="phone_number" value="{{ $user->phone_number }}">
                    </div>

                    @error('phone_number')
                        <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror


                    <label for="">gender</label>
                    <div class="mt-1 w-full flex justify-start items-center gap-8 text-sm sm:text-base">
                        <div class="flex justify-center items-center gap-2">
                            <input type="radio" id="laki-laki" name="gender" value="Laki-laki"
                                @if ($user->gender == 'Laki-laki') checked="checked" @endif>
                            <label for="laki-laki">Laki-laki</label>
                        </div>

                        <div class="flex justify-center items-center gap-2">
                            <input type="radio" id="laki-perempuan" name="gender" value="Perempuan"
                                @if ($user->gender == 'Perempuan') checked="checked" @endif>
                            <label for="perempuan">Perempuan</label>
                        </div>
                        @error('gender')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
