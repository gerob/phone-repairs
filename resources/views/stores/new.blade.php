@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Create New Store</h4>
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
        <form action="{{ route('stores.new.post') }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="store_number">Club Number</label>
                <input type="text" name="store_number" class="form-control" value="{{ old('store_number') }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Store</button>
            </div>
        </form>
    </div>
@endsection