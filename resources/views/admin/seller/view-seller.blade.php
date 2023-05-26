@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        View Seller
    </h1>
    <a href="{{route('create-seller')}}">Add</a>

    <table style="border:1px solid black">
        <th>
            <td>name</td>
            <td>address</td>
            <td>phone</td>
            <td>action</td>
        </th>
        @foreach ($sellers as $seller)
            <tr>

                <td>{{ $seller->seller_name }}</td>
                <td>{{ $seller->seller_address }}</td>
                <td>{{ $seller->seller_phone }}</td>
                <td>
                    <a href="{{route('edit-seller', ['id'=>$seller->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete-seller', ['id'=>$seller->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
