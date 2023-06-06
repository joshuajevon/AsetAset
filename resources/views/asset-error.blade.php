@extends('template.template')

@section('head')
    {{-- Splide --}}
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/asset-by-id.css') }}?t={{ env('VERSION_TIME') }}">
@endsection

@section('body')

Gagal Beli Aset Anda diharuskan login terlebih dahulu untuk membeli aset ini.  Klik disini untuk login atau klik disini untuk mendaftar.

@endsection
