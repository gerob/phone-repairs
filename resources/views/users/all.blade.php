@extends('template')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Edit</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-default">Edit User</a></td>
            </tr>
        @endforeach
    </table>
@endsection