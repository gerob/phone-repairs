@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">All Stores</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <a href="{{ route('stores.new') }}" class="btn btn-success pull-right">+ New Store</a>
            </div>
        </div>
        <br>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Store Name</th>
                    <th>Edit</th>
                </tr>
                @foreach($stores as $store)
                    <tr>
                        <td>{{$store->number}}</td>
                        <td><a href="{{ route('stores.edit', $store->id) }}" class="btn btn-default">Edit Store</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection