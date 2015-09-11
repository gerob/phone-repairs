@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Add/Edit {{ $device->model }} Services</h4>
    </div>

    <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('deviceservices.edit.post', $device->id) }}" method="POST">
            {!! csrf_field() !!}

            <table class="table">
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>UPC</th>
                    <th>Active</th>
                </tr>
                @foreach ($all_services as $all_service)
                    <tr>
                        <td>{{$all_service->name}}</td>
                        <td>
                            <input type="text" name="services[{{$all_service->id}}][price]"
                                   value="" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="services[{{$all_service->id}}][upc]" class="form-control">
                        </td>
                        <td>
                            <input type="checkbox" name="services[{{$all_service->id}}]"
                                   value="{{ $all_service->id }}">
                        </td>
                        {{--@foreach($services as $service)--}}
                            {{--@if($service->id == $all_service->id)--}}
                                {{--<td>--}}
                                    {{--<input type="text" name="services[{{$service->id}}][price]"--}}
                                           {{--value="{{$service->pivot->price}}" class="form-control">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input type="text" name="services[{{$service->id}}][upc]" class="form-control">--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<input type="checkbox" name="services[{{$service->id}}]"--}}
                                           {{--value="{{ $all_service->id }}" checked>--}}
                                {{--</td>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    </tr>
                @endforeach
            </table>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Device Services</button>
            </div>
        </form>
    </div>
@endsection