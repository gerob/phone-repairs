@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">All Devices</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('devices.new') }}" class="btn btn-success pull-right">+ New Device</a>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th>Edit</th>
                </tr>
                @foreach($devices as $device)
                    <tr>
                        <td>{{$device->manufacturer}}</td>
                        <td>{{$device->model}}</td>
                        <td><a href="{{ route('devices.edit', $device->id) }}" class="btn btn-default">Edit Device</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection