@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Repair Orders</h4>
    </div>
    <div class="panel-body">
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline" method="get" action="{{route('orders.list')}}">
                        <div><small>NOTE: Search by customer’s phone number (format 111-222-3333) or e-mail address.</small></div>
                        <div class="form-group">
                            <label class="sr-only">Search</label>

                            <p class="form-control-static">Search</p>
                        </div>
                        <div class="form-group">
                            <label for="q" class="sr-only">Search for</label>
                            <input type="text" class="form-control" name="q" placeholder="Search for...">
                        </div>
                        <button type="submit" class="btn btn-default">Go</button>
                    </form>
                </div>
            </div>
        </div>
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
                            <th>Store Number</th>
                            <th>Make a Claim</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="col-md-3">{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td class="col-md-3">{{ $order->phone }}</td>
                                <td class="col-md-2">{{ $order->serial_number }}</td>
                                <td class="col-md-2">{{ $order->warranty_years }}</td>
                                <td>
                                    <a href="{{ route('orders.list.store', $order->store_number) }}">{{ $order->store_number }}</a>
                                </td>
                                <td class="col-md-2"><a href="{{ route('orders.claim', $order->id) }}"
                                                        class="btn btn-default">Details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection