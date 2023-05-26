@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <x-navigation-bar page="beranda" />

    <div class="c-container h-screen flex justify-center items-center">
        <h1 class="text-3xl font-bold underline">
            Hello world Test!
        </h1>
    </div>

@endsection
