@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Create New Device</h4>
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
        <form action="{{ route('devices.edit.post', $device->id) }}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="manufacturer">Manufacturer</label>
                <select name="manufacturer" id="manufacturer" class="form-control">
                    <option>Choose a Manufacturer:</option>
                    <option value="SamsungSC" {{ $device->manufacturer == 'SamsungSC' ? 'selected' : '' }}>SamsungSC</option>
                    <option value="AppleSC" {{ $device->manufacturer == 'AppleSC' ? 'selected' : '' }}>AppleSC</option>
                </select>
            </div>

            <div class="form-group">
                <label for="model">Model Name</label>
                <input type="text" name="model" class="form-control" value="{{ old('model') ?: $device->model }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Device</button>
            </div>
        </form>
    </div>
@endsection