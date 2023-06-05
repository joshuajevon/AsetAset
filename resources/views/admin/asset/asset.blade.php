@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        View Asset
    </h1>

    <a href="{{route('create-asset')}}">Add</a>

    <table style="border:1px solid black">
        <th>
            <td>name</td>
            <td>action</td>
        </th>
        @foreach ($assets as $asset)
            <tr>

                <td>{{ $asset->name }}</td>
                <td>
                    <a href="{{route('view-asset', ['id'=>$asset->id])}}"><button type="submit" class="btn btn-success">View</button></a>
                    <a href="{{route('edit-asset', ['id'=>$asset->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete-asset', ['id'=>$asset->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
