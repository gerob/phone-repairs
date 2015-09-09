@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">All Services</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('services.new') }}" class="btn btn-success pull-right">+ New Service</a>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Service Name</th>
                    <th>Edit</th>
                </tr>
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->name}}</td>
                        <td><a href="{{ route('services.edit', $service->id) }}" class="btn btn-default">Edit Service</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection