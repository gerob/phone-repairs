@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>

    <div class="panel-body">
        <form action="{{ route('orders.claim.post', $order->id) }}" method="post">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-6">
                    <h4>Customer Information</h4>

                    <strong>First Name: </strong> {{ $order->first_name }} <br>
                    <strong>Last Name: </strong> {{ $order->last_name }} <br>
                    <strong>Email: </strong> {{ $order->email }} <br>
                    <strong>Address: </strong> {{ $order->address }} <br>
                    <strong>Address2: </strong> {{ $order->address2 }} <br>
                    <strong>Address: </strong> {{ $order->address }} <br>
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
                    <strong>Claim: </strong> {{ $order->claim == 'on' ? 'Square Trade Claim' : '' }} <br>
                    <strong>Claim Number: </strong> {{ $order->claim_number }} <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Repair Description</th>
                                <th>Repair UPC</th>
                                <th>Make a Claim</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $index => $service)
                                <tr>
                                    <td>{{ $index + 1 }} {{ $service->name }} -
                                        ${{ number_format(($service->price/100), 2) }}</td>
                                    <td>
                                        {!! $barcode->getBarcodeObj('UPCA', $service->upc, -2, -30, 'black', array(0, 0, 0, 0))->getHtmlDiv() !!}
                                        <p>{{ $service->upc }}</p>
                                    </td>
                                    <td><input type="checkbox"
                                               name="services[{{ $service->id }}]['claim']" {{ $service->claim_completed ? "checked":""}} />
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="">
                        <label for="description">Notes: </label>
                        <textarea class="form-control" name="description">{{ $order->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="center-all">
                <hr>
                <button type="submit" class="btn btn-success">Make Warranty Claim</button>
            </div>
        </form>
    </div>
@endsection