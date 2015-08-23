@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>

    <div class="panel-body">
        <form action="{{ route('repairs.review.post') }}" method="post">
            {!! csrf_field() !!}

            <div class="row">
                <div class="col-md-6">
                    <h4>Customer Information</h4>

                    <strong>First Name: </strong> {{ $invoice->first_name }} <br>
                    <strong>Last Name: </strong> {{ $invoice->last_name }} <br>
                    <strong>Email: </strong> {{ $invoice->email }} <br>
                    <strong>Address: </strong> {{ $invoice->address }} <br>
                    <strong>Address2: </strong> {{ $invoice->address2 }} <br>
                    <strong>Address: </strong> {{ $invoice->address }} <br>
                    <strong>City: </strong> {{ $invoice->city }} <br>
                    <strong>State: </strong> {{ $invoice->state }} <br>
                    <strong>Zip Code: </strong> {{ $invoice->zip }} <br>
                    <strong>Phone Number: </strong> {{ $invoice->phone }} <br>
                    <strong>Member Type: </strong> {{ $invoice->member_type }} <br>
                    <strong>Member Number: </strong> {{ $invoice->member_number }} <br>
                </div>
                <div class="col-md-6">
                    <h4>Device Information</h4>

                    <strong>Device: </strong> {{ $invoice->device_name }} <br>
                    <strong>Color: </strong> {{ $invoice->color }} <br>
                    <strong>Carrier: </strong> {{ $invoice->carrier }} <br>
                    <strong>Claim: </strong> {{ $invoice->claim == 'on' ? 'Square Trade Claim' : '' }} <br>
                    <strong>Claim Number: </strong> {{ $invoice->claim_number }} <br>
                    <strong>Description: </strong> {{ $invoice->description }} <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td><h4>Repair Description</h4></td>
                                <td><h4>Repair UPC</h4></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->services as $index => $service)
                                <tr>
                                    <td>{{ $index + 1 }} {{ $service['name'] }} - {{ $service['price'] }}</td>
                                    <td>
                                        <img src="{{ \DNS1D::getBarcodePNGPath($service['upc'], "UPCA") }}"
                                             alt="{{ $service['upc'] }}"/>

                                        <p>{{ $service['upc'] }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="center-all">
                        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                        <button type="button" class="btn btn-default back">Back</button>
                        <button type="submit" class="btn btn-success">Submit Work Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection