@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        View owner
    </h1>

    <table style="border:1px solid black">
        <th>
            <td>name</td>
            <td>address</td>
            <td>phone</td>
            <td>action</td>
        </th>
            <tr>

                <td>{{ $owner->owner_name }}</td>
                <td>{{ $owner->owner_address }}</td>
                <td>{{ $owner->owner_phone }}</td>
                <td>
                    <a href="{{route('edit-owner', ['id'=>$owner->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete-owner', ['id'=>$owner->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
    </table>
@endsection
