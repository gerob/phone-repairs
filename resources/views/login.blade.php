@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Portal Login</h4>
    </div>

    <div class="panel-body">
        <form action="{{ route('login') }}" class="login-form col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">Login</button>
            </div>
        </form>
    </div>
@endsection