@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')

    <a href="{{route('view-asset')}}">CRUD aset</a>
    <a href="{{route('view-seller')}}">CRUD seler</a>
    <a href="{{route('view-owner')}}">CRUD owner</a>

@endsection
