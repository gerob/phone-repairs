@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Inventory Fulfillment</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('inventory.werx.export') }}" class="btn btn-warning pull-right">Export to CSV</a>
                @foreach(\App\Store::all() as $store)
                    <a href="{{ route('inventory.werx', $store->number) }}" class="btn btn-sm btn-default"
                       style="margin-bottom: 5px;">{{$store->number}}</a>
                @endforeach
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('inventory.review.post')}}" method="post" id="inventory-form">
                    {!!csrf_field()!!}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-md-5">Device - Service</th>
                                <th class="col-md-2">UPC</th>
                                <th class="col-md-2">Store Number</th>
                                <th class="col-md-1">Count</th>
                                <th class="col-md-1">Inventory Threshold</th>
                                <th class="col-md-1">Inventory Fulfillment</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="6" class="alert alert-warning" style="text-align: center;">
                                    <strong>{{$store_number}}</strong></td>
                            </tr>
                            @foreach($inventory as $inv)
                                <input type="hidden" value="{{$inv->id}}" name="inventories[{{$inv->id}}]"/>
                                <tr id="inventory-{{$inv->id}}">
                                    <td>
                                        <input type="hidden"
                                               value="{{ $inv->deviceService->dsDevice->model }} - {{ $inv->deviceService->dsService->name }}"
                                               name="inventories[{{$inv->id}}][service_device]"/>
                                        {{ $inv->deviceService->dsDevice->model }}
                                        - {{ $inv->deviceService->dsService->name }}
                                    </td>
                                    <td>
                                        <img src="data:image/png;base64,{{ base64_encode($barcode->getBarcodeObj('UPCA', $inv->upc, -2, -30, 'black', array(0, 0, 0, 0))->getPngData()) }}" alt="{{ $inv->upc }}">
                                        <p>{{ $inv->upc }}</p>
                                    </td>
                                    <td>
                                        <input type="hidden" value="{{ $inv->store_number }}"
                                               name="inventories[{{$inv->id}}][store]">
                                        {{ $inv->store_number }}
                                    </td>
                                    <td>
                                        <input type="hidden" value="{{ $inv->count }}"
                                               name="inventories[{{$inv->id}}][count]">
                                        {{ $inv->count }}
                                    </td>
                                    <td>{{ $inv->threshold }}</td>
                                    <td><input class="form-control" type="number"
                                               value="{{ old('inventories['.$inv->id.']') }}"
                                               name="inventories[{{$inv->id}}][quantity]"/></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="center-all">
                        <br>
                        <input class="btn btn-success" type="submit"
                               value="Submit Inventory Replenishment for {{ $store_number }}">
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection