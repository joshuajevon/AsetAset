@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')

    <a href="{{route('view-asset')}}">CRUD aset</a>
    <a href="{{route('view-seller')}}">CRUD seler</a>
    <a href="{{route('view-owner')}}">CRUD owner</a>
    <div class="p-2">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
            class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-red-700 hover:bg-red-50"
            role="menuitem">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                <path fill-rule="evenodd"
                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
            </svg>
                Logout
            </button>
        </form>
    </div>

@endsection
