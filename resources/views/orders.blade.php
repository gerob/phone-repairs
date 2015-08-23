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
                            <th>Customer</th>
                            <th>Phone</th>
                            <th>Serial EID</th>
                            <th>Warranty Expiration</th>
                            <th>Make a Claim</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="col-md-1">{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td class="col-md-2">{{ $order->phone }}</td>
                                <td class="col-md-1">{{ $order->serial_number }}</td>
                                <td class="col-md-2">{{ $order->warranty_years }}</td>
                                <td class="col-md-2"><button type="submit" class="btn btn-default">Make a Claim</button></td>
                                {{--<td class="col-md-4">--}}
                                    {{--@foreach($order->coServices as $service)--}}
                                        {{--<span>{{ $service->name }} - {{ $service->price }}</span> <br>--}}
                                    {{--@endforeach--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection