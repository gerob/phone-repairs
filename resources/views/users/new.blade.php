@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Create New User</h4>
    </div>

    <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.new.post') }}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>

            <div class="form-group">
                <label for="store_number">Default Store</label>
                <select class="form-control" name="store_id">
                    <option value="">Choose a Store:</option>
                    @foreach($stores as $store)
                        <option value="{{ $store->id }}" {{ (old('store_id') == $store->id ? "selected":"") }}>
                            {{ $store->number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection