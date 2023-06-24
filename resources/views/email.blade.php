@extends('template.template')

@section('head')
    {{-- Splide --}}

    {{-- css --}}

@endsection

@section('body')
<h1>Pesan dari Formulir Kontak</h1>

<p>Email Pengirim: </p>
<a href="mailto:{{ $email }}">{{ $email }}</a>

<p>Pesan: {{ $mail }}</p>

@endsection
