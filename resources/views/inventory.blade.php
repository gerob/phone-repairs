@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Inventory Fulfillment</h4>
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
                            <th class="col-md-5">Device - Service</th>
                            <th class="col-md-2">UPC</th>
                            <th class="col-md-2">Store Number</th>
                            <th class="col-md-1">Count</th>
                            <th class="col-md-1">Full Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{ $last_store = "" }}
                        @foreach($inventory as $inv)
                            @if($last_store !== $inv->store_number)
                                <tr>
                                    <td colspan="6" class="alert alert-warning" style="text-align: center;">
                                        <strong>{{$inv->store_number}}</strong></td>
                                </tr>
                            @endif
                            <?php $last_store = $inv->store_number ?>
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
                                    {!! $barcode->getBarcodeObj('UPCA', $inv->upc, -2, -30, 'black', array(0, 0, 0, 0))->getHtmlDiv() !!}
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="center-all">
                    {!! $inventory->render() !!} <br>
                </div>
            </div>
        </div>

    </div>

@endsection