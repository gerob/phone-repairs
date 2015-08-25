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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('repairs.manufacturer') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-xs-5 col-xs-offset-1">
                            <img src="/img/iPhoneImage-300x300.jpg" alt="Apple iPhone"
                                 class="pull-right img-responsive img-radio">
                            <button type="button" class="btn btn-radio">Apple</button>
                            <input type="radio" name="manufacturer" value="AppleSC" class="hidden">
                        </div>
                        <div class="col-xs-5">
                            <img src="/img/smartphoneImage-300x300.jpg" alt="Samsung Smartphone"
                                 class="img-responsive img-radio">
                            <button type="button" class="btn btn-radio">Samsung</button>
                            <input type="radio" name="manufacturer" value="SamsungSC" class="hidden">
                        </div>
                        <div class="col-xs-12 center-all">
                            <button type="submit" class="btn btn-primary btn-block">Select manufacturer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection