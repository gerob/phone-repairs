@extends('......template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>

    <div class="panel-body">
        <form action="{{ route('order.new.review.post', $order->id) }}" method="post">
            {!! csrf_field() !!}

            <div class="center-all">
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <button type="button" class="btn btn-default back">Back</button>
                <button type="submit" class="btn btn-success">Submit Work Order</button>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h4>Customer Information</h4>

                    <strong>First Name: </strong> {{ $order->first_name }} <br>
                    <strong>Last Name: </strong> {{ $order->last_name }} <br>
                    <strong>Email: </strong> {{ $order->email }} <br>
                    <strong>Address: </strong> {{ $order->address }} <br>
                    <strong>Address 2: </strong> {{ $order->address2 }} <br>
                    <strong>City: </strong> {{ $order->city }} <br>
                    <strong>State: </strong> {{ $order->state }} <br>
                    <strong>Zip Code: </strong> {{ $order->zip }} <br>
                    <strong>Phone Number: </strong> {{ $order->phone }} <br>
                    <strong>Member Type: </strong> {{ $order->member_type }} <br>
                    <strong>Member Number: </strong> {{ $order->member_number }} <br>
                </div>
                <div class="col-md-6">
                    <h4>Device Information</h4>

                    <strong>Device: </strong> {{ $order->device_name }} <br>
                    <strong>Color: </strong> {{ $order->color }} <br>
                    <strong>Carrier: </strong> {{ $order->carrier }} <br>
                    <strong>Claim: </strong> {{ $order->claim == 'on' ? 'Square Trade' : '' }} <br>
                    <strong>Claim Number: </strong> {{ $order->claim_number }} <br>
                    <strong>Description: </strong> {{ $order->description }} <br>

                    <h4>Order Information</h4>
                    <strong>Store Number</strong> {{ $order->store_number }} <br>
                    <strong>Technician Initials</strong> {{ $order->technician_initials }} <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Repair Description</th>
                                <th>Price</th>
                                <th>Repair UPC</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $index => $service)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $service['name'] }}</td>
                                    <td>${{ number_format(($service['price']/100), 2) }}</td>
                                    <td>
                                        <img src="data:image/png;base64,{{ base64_encode($barcode->getBarcodeObj('UPCA', $service->upc, -2, -30, 'black', array(0, 0, 0, 0))->getPngData()) }}" alt="{{ $service->upc }}">
                                        <p>{{ $service->upc }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection