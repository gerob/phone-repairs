@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Review Inventory Changes</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('inventory.update.post')}}" method="post">
                    {!!csrf_field()!!}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-md-4">Device - Service</th>
                                <th class="col-md-2">Club Number</th>
                                <th class="col-md-1">Count</th>
                                <th class="col-md-1">Inventory Change</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($updates as $id => $update)
                                <tr id="inventory-{{$id}}">
                                    <td>
                                        {{ $update['name'] }}
                                    </td>
                                    <td>{{ $update['store'] }}</td>
                                    <td>{{ $update['count'] }}</td>
                                    <td><input class="form-control" type="text" value="{{ $update['quantity'] }}" name="updates[{{$id}}][quantity]" /></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <input class="btn btn-warning" type="submit" value="Confirm Inventory Replenishment" >
                </form>
            </div>
        </div>

    </div>

@endsection