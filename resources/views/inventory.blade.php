@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Repair Orders</h4>
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

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-md-6">Device - Service</th>
                            <th class="col-md-5">UPC</th>
                            <th class="col-md-3">Store</th>
                            <th class="col-md-2">Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inventory as $inv)
                            <tr>
                                <td>{{ $inv->device_name }} - {{ $inv->service_name }}</td>
                                <td><img src="{{ \DNS1D::getBarcodePNGPath($inv->upc, "UPCA") }}"
                                         alt="{{ $inv->upc }}"/>
                                    <p>{{ $inv->upc }}</p>
                                </td>
                                <td>{{ $inv->store_number }}</td>
                                <td>{{ $inv->count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection