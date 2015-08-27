@extends('......template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="center-all">
                    <strong>In-Store Device Repair</strong>

                    <p>Choose one of the following devices from the manufacturer.</p>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('repairs.device.post') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="form-group">
                            <label for="device"> Supported {{ $manufacturer }} Devices</label>
                            <select class="form-control" name="device">
                                <option value="">Choose a Device:</option>
                                @foreach($devices as $device)
                                    <option value="{{ $device->id }}">{{ $device->model }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="center-all">
                            <button type="submit" class="btn btn-primary btn-block">Select device</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection