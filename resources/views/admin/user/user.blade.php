@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        View user
    </h1>

    <table style="border:1px solid black">
        <th>
            <td>name</td>
            <td>action</td>
        </th>
        @foreach ($users as $user)
            <tr>

                <td>{{ $user->name }}</td>
                <td>
                    <a href="{{route('view-user',['id'=>$user->id])}}">View</a>
                    <a href="{{route('edit-user', ['id'=>$user->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete-user', ['id'=>$user->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
