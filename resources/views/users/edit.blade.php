@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Edit User</h4>
    </div>

    <div class="panel-body">
    <form action="{{ route('users.edit.post') }}" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') ?: $user->username }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') ?: $user->email }}">
        </div>

        <div class="form-group">
            <label for="password">Password (enter new password to change)</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
    </div>
@endsection