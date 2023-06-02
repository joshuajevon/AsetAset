@extends('template.template')

@section('head')
    {{-- Splide --}}

    {{-- css --}}

@endsection

@section('body')
<h1>Pesan dari Formulir Kontak</h1>
<p>Email Pengirim: {{ $email }}</p>
<p>Pesan: {{ $mail }}</p>

@endsection
