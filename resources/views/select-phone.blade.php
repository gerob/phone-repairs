@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="center-all">
                    <strong>In-Store Device Repair</strong>

                    <p>Choose one of the following manufacturers for in-store service.</p>
                </div>
                <form action="{{ route('repairs.post') }}">
                    {!! csrf_field() !!}


                </form>
            </div>
        </div>

    </div>

@endsection