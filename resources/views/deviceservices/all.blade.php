@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Edit Device Services</h4>
    </div>
    <div class="panel-body">
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
                        <td><a href="{{ route('deviceservices.edit', $device->id) }}" class="btn btn-default">Edit Device Services</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection