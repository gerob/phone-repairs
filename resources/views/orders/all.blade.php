@extends('...template')

@section('page-title')
Mobile Device Repair Portal - All Orders
@endsection

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Portal - All Orders</h4>
    </div>
    <div class="panel-body">
        <div class="well">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline" method="get" action="{{route('orders.list.all')}}">
                        <div><small>NOTE: Search by customer’s last name, phone number (format 111-222-3333) or e-mail address.</small></div>
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
                <a href="{{ route('orders.export.all', ['q' => Input::get('q')]) }}" class="btn btn-warning">Export to CSV</a>
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
                            <th>Order Date</th>
                            <th>Customer</th>
                            <th>Club Number</th>
                            <th>Make a Claim</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{ $last_store = "" }}
                        @foreach($orders as $order)
                            @if($last_store !== $order->store_number)
                                <tr>
                                    <td colspan="6" class="alert alert-warning" style="text-align: center;">
                                        <strong>{{$order->store_number}}</strong></td>
                                </tr>
                            @endif
                            <?php $last_store = $order->store_number ?>
                            <tr>
                                <td class="col-md-4">{{ $order->created_at }}</td>
                                <td class="col-md-4">{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td class="col-md-2">{{ $order->store_number }}</td>
                                <td class="col-md-2"><a href="{{ route('orders.detail', $order->id) }}"
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