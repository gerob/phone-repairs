@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Edit Service</h4>
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
        <form action="{{ route('services.edit.post', $service->id) }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="service_name">Service Name</label>
                <input type="text" name="service_name" class="form-control" value="{{ old('service_name') ?: $service->name }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Service</button>
            </div>
        </form>
    </div>
@endsection