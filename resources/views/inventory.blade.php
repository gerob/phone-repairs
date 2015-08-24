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
                                <th class="">Device - Service</th>
                                <th class="">UPC</th>
                                <th class="">Store Number</th>
                                <th class="">Count</th>
                                <th class="">Inventory Fulfillment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inventory as $inv)
                                <input type="hidden" value="{{$inv->id}}" name="inventories[{{$inv->id}}]" />
                                <tr>
                                    <td>
                                        {{--@if(isset($inv->deviceService->dsDevice->model) && isset($inv->deviceService->dsDevice->model))--}}
                                        {{--{{ $inv->deviceService->dsDevice->model }} - {{ $inv->deviceService->dsService->name }}--}}
                                        {{--@endif--}}
                                    </td>
                                    <td><img src="{{ \DNS1D::getBarcodePNGPath($inv->upc, "UPCA") }}"
                                             alt="{{ $inv->upc }}"/>
                                        <p>{{ $inv->upc }}</p>
                                    </td>
                                    <td>{{ $inv->store_number }}</td>
                                    <td>{{ $inv->count }}</td>
                                    <td><input type="number" value="" name="inventories[{{$inv->id}}]" /></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <input class="btn btn-success" type="submit" value="Submit Inventory Replenishment" >
                </form>
            </div>
        </div>

    </div>

@endsection