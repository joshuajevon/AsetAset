@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">Name </label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}" required autofocus autocomplete="name" />
            @error('name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
        </div>

        <!-- Nick Name -->
        <div>
            <label for="nickname">panggilan </label>
            <input id="nickname" class="block mt-1 w-full" type="text" name="nickname" value="{{old('nickname')}}" required autofocus autocomplete="nickname" />
            @error('nickname')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" >email </label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}" required autocomplete="username" />
            @error('email')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
        </div>


        <!-- no Hp  -->
        <div>
            <label for="phone_number" >hp </label>
            <input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" value="{{old('phone_number')}}" required autofocus autocomplete="phone_number" />
            @error('phone_number')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
        </div>

        <!-- gender  -->
        <div>
            <label for="gender" >gender </label>
            <div class="male">
                <input type="radio" id="male" name="gender" value="Laki-laki" @if (old('gender') == "Laki-laki") checked @endif>
                <label for="male">Laki-laki</label>
            </div>

            <div class="female">
                <input type="radio" id="female" name="gender" value="Perempuan" @if (old('gender') == "Perempuan") checked @endif>
                <label for="female">Perempuan</label>
            </div>

            @error('gender')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" >pass </label>

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

                            @error('password')
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" >conf pass </label>

            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                            @error('password_confirmation')
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
@endsection
