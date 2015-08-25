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

                <form action="{{route('inventory.update.post')}}" method="post">
                {!!csrf_field()!!}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-md-4">Device - Service</th>
                                <th class="col-md-2">UPC</th>
                                <th class="col-md-2">Store Number</th>
                                <th class="col-md-1">Count</th>
                                <th class="col-md-1">Inventory Threshold</th>
                                <th class="col-md-1">Inventory Fulfillment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inventory as $inv)
                                <input type="hidden" value="{{$inv->id}}" name="inventories[{{$inv->id}}]" />
                                <tr id="inventory-{{$inv->id}}">
                                    <td>
                                        {{ $inv->deviceService->dsDevice->model }} - {{ $inv->deviceService->dsService->name }}
                                    </td>
                                    <td>
                                        {!! $barcode->getBarcodeObj('UPCA', $inv->upc, -2, -30, 'black', array(0, 0, 0, 0))->getHtmlDiv() !!}
                                        <p>{{ $inv->upc }}</p>
                                    </td>
                                    <td>{{ $inv->store_number }}</td>
                                    <td>{{ $inv->count }}</td>
                                    <td>{{ $inv->threshold }}</td>
                                    <td><input class="form-control" type="number" value="" name="inventories[{{$inv->id}}]" /></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $inventory->render() !!}
                    <input class="btn btn-success" type="submit" value="Submit Inventory Replenishment" >
                </form>
            </div>
        </div>

    </div>

@endsection