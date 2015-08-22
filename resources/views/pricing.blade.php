@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>
    <div class="panel-body">
        <form action="{{ route('repairs.pricing.post') }}" method="post">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-sm-12">
                    <p class="alert-info">
                        <strong>NOTE:</strong> all screen replacements include both the LCD and digitizer (except
                        iPads).
                        This is the best and most efficient way to perform a screen replacement. Smaller independent
                        retailers may offer screen repairs at a lower price, but many are not replacing the full
                        assembly -
                        only the front glass.
                    </p>
                </div>

                <div class="col-md-6">
                    <h4>Customer Information</h4>

                    <div class="form-group">
                        <label for="first_name"> First Name </label>
                        <input type="text" class="form-control" name="first_name">
                    </div>

                    <div class="form-group">
                        <label for="last_name"> Last Name </label>
                        <input type="text" class="form-control" name="last_name">
                    </div>

                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="phone"> Telephone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="123-456-7890">

                        <div class="help-block">List phone other than one being repaired.</div>
                    </div>
                    <div class="form-group">
                        <label for="address"> Address </label>
                        <input type="text" class="form-control" name="address">
                    </div>

                    <div class="form-group">
                        <label for="address2"> Address 2 </label>
                        <input type="text" class="form-control" name="address2">
                    </div>

                    <div class="form-group">
                        <label for="city"> City </label>
                        <input type="text" class="form-control" name="city">
                    </div>

                    <div class="form-group">
                        <label for="state"> State </label>
                        <select class="form-control" name="state">
                            <option value="">Choose a State:</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="zip"> Zip Code </label>
                        <input type="text" class="form-control" name="zip">
                    </div>

                    <div class="form-group">
                        <label for="membership_type"> Membership Type</label>
                        <select class="form-control" name="membership_type">
                            <option value="">Choose a Membership:</option>
                            <option value="plus">Plus</option>
                            <option value="business">Business</option>
                            <option value="savings">Savings</option>
                            <option value="trial">Trial Pass</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="membership_number"> Membership Number</label>
                        <input type="text" class="form-control" name="membership_number">
                    </div>

                </div>
                <div class="col-md-6">
                    <h4>Device Information</h4>

                    <div class="form-group">
                        <label for="device"> Device Name</label>
                        <input type="text" class="form-control" name="device" value="{{ $device->model }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="color"> Color</label>
                        <input type="text" class="form-control" name="color">
                    </div>

                    <div class="form-group">
                        <label for="serial_number"> Serial Number</label>
                        <input type="text" class="form-control" name="serial_number">
                    </div>

                    <div class="form-group">
                        <label for="carrier"> Carrier</label>
                        <select class="form-control" name="carrier">
                            <option value="">Choose a Carrier:</option>
                            <option value="at&t">AT&T</option>
                            <option value="sprint">Sprint</option>
                            <option value="t-mobile">T-Mobile</option>
                            <option value="verizon">Verizon</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="claim"> Square Trade Claim?
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="claim_number"> Claim Number</label>
                        <input type="text" class="form-control" name="claim_number" placeholder="If checked yes">
                    </div>

                    <div class="form-group">
                        <label for="description"> Description</label>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="store_number"> Store Number</label>
                        <input type="text" class="form-control" name="store_number">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel-body">
                    <h4>Choose Your Repair Services (all applicable)</h4>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Description</th>
                                <th>Price</th>
                                <th>UPC</th>
                                <th>Select</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td>${{ number_format(($service->pivot->price/100), 2) }}</td>
                                    <td>{{ $service->pivot->upc }}</td>
                                    <td><input type="checkbox" name="service" value="{{ $service->name }}"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <input type="submit" value="Submit Pricing Form" class="btn btn-block btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection