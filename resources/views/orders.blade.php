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
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Store Number</th>
                            <th>Device Name</th>
                            <th>Color</th>
                            <th>Services</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="col-md-1">{{ $order->id }}</td>
                                <td class="col-md-2">{{ $order->created_at }}</td>
                                <td class="col-md-1">{{ $order->store_number }}</td>
                                <td class="col-md-2">{{ $order->device_name }}</td>
                                <td class="col-md-2">{{ $order->color }}</td>
                                <td class="col-md-4">
                                    @foreach($order->services as $service)
                                        <span>{{ $service['name'] }} - {{ $service['price'] }}</span> <br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection