@extends('......template')

@section('content')

    <div class="panel-heading hidden-print">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>

    <div class="panel-body">
        <form action="{{ route('order.new.confirm.post', $order->id) }}" method="post">
            {!! csrf_field() !!}
            <div class="center-all hidden-print">
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <button type="button" class="btn btn-default" onclick="window.print()">Print</button>
                <button type="submit" class="btn btn-success">Finish</button>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4>Customer Information</h4>

                    <strong>First Name: </strong> {{ $order->first_name }} <br>
                    <strong>Last Name: </strong> {{ $order->last_name }} <br>
                    <strong>Member Number: </strong> {{ $order->member_number }} <br>
                    <strong>Claim Number: </strong> {{ $order->claim_number }} <br>
                    <br>
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
                                        <img src="data:image/png;base64,{{ base64_encode($barcode->getBarcodeObj('UPCA', $service->upc, -2, -30, 'black', array(0, 0, 0, 0))->getPngData()) }}"
                                             alt="{{ $service->upc }}">

                                        <p>{{ $service->upc }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <hr>
                    <p>By signing below, I agree that:</p>

                    <ul>
                        <li> the Repair Terms and Conditions (<a href="http://samsrepairservices.com/terms-and-conditions">samsrepairservices.com/terms-and-conditions</a>) will apply to
                            the service of the products that are given to SquareTrade for repair;
                        </li>

                        <li> SquareTrade is not responsible for any loss, corruption, or breach of the data on my
                            product during service; and
                        </li>

                        <li> as loss of data may occur as a result of the service, it is my responsibility to make a
                            backup copy of my data before bringing my product to SquareTrade for service
                        </li>
                    </ul>
                    <hr>
                </div>
                <div class="col-xs-8">
                    <p class="signature-line">
                        Customer Signature
                    </p>
                </div>
                <div class="col-xs-4">
                    <p class="signature-line">
                        Date
                    </p>
                </div>
            </div>

        </form>
    </div>
@endsection