@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">All Users</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('users.new') }}" class="btn btn-success pull-right">+ New User</a>
            </div>
        </div>
        <br>
        <div class="row">
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
        </div>
    </div>
@endsection