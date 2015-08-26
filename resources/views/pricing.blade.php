@extends('template')

@section('content')
    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
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
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name"> Last Name </label>
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone"> Telephone Number</label>
                        <input type="text" class="form-control" name="phone" placeholder="123-456-7890"
                               value="{{ old('phone') }}">

                        <div class="help-block">List phone other than one being repaired.</div>
                    </div>
                    <div class="form-group">
                        <label for="address"> Address </label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    </div>

                    <div class="form-group">
                        <label for="address2"> Address 2 </label>
                        <input type="text" class="form-control" name="address2" value="{{ old('address2') }}">
                    </div>

                    <div class="form-group">
                        <label for="city"> City </label>
                        <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                    </div>

                    <div class="form-group">
                        <label for="state"> State </label>
                        <select class="form-control" name="state">
                            <option value="">Choose a State:</option>
                            <option value="AL" {{ (old('state') == 'AL' ? "selected":"") }}>Alabama</option>
                            <option value="AK" {{ (old('state') == 'AK' ? "selected":"") }}>Alaska</option>
                            <option value="AZ" {{ (old('state') == 'AZ' ? "selected":"") }}>Arizona</option>
                            <option value="AR" {{ (old('state') == 'AR' ? "selected":"") }}>Arkansas</option>
                            <option value="CA" {{ (old('state') == 'CA' ? "selected":"") }}>California</option>
                            <option value="CO" {{ (old('state') == 'CO' ? "selected":"") }}>Colorado</option>
                            <option value="CT" {{ (old('state') == 'CT' ? "selected":"") }}>Connecticut</option>
                            <option value="DE" {{ (old('state') == 'DE' ? "selected":"") }}>Delaware</option>
                            <option value="DC" {{ (old('state') == 'DC' ? "selected":"") }}>District Of Columbia
                            </option>
                            <option value="FL" {{ (old('state') == 'FL' ? "selected":"") }}>Florida</option>
                            <option value="GA" {{ (old('state') == 'GA' ? "selected":"") }}>Georgia</option>
                            <option value="HI" {{ (old('state') == 'HI' ? "selected":"") }}>Hawaii</option>
                            <option value="ID" {{ (old('state') == 'ID' ? "selected":"") }}>Idaho</option>
                            <option value="IL" {{ (old('state') == 'IL' ? "selected":"") }}>Illinois</option>
                            <option value="IN" {{ (old('state') == 'IN' ? "selected":"") }}>Indiana</option>
                            <option value="IA" {{ (old('state') == 'IA' ? "selected":"") }}>Iowa</option>
                            <option value="KS" {{ (old('state') == 'KS' ? "selected":"") }}>Kansas</option>
                            <option value="KY" {{ (old('state') == 'KY' ? "selected":"") }}>Kentucky</option>
                            <option value="LA" {{ (old('state') == 'LA' ? "selected":"") }}>Louisiana</option>
                            <option value="ME" {{ (old('state') == 'ME' ? "selected":"") }}>Maine</option>
                            <option value="MD" {{ (old('state') == 'MD' ? "selected":"") }}>Maryland</option>
                            <option value="MA" {{ (old('state') == 'MA' ? "selected":"") }}>Massachusetts</option>
                            <option value="MI" {{ (old('state') == 'MI' ? "selected":"") }}>Michigan</option>
                            <option value="MN" {{ (old('state') == 'MN' ? "selected":"") }}>Minnesota</option>
                            <option value="MS" {{ (old('state') == 'MS' ? "selected":"") }}>Mississippi</option>
                            <option value="MO" {{ (old('state') == 'MO' ? "selected":"") }}>Missouri</option>
                            <option value="MT" {{ (old('state') == 'MT' ? "selected":"") }}>Montana</option>
                            <option value="NE" {{ (old('state') == 'NE' ? "selected":"") }}>Nebraska</option>
                            <option value="NV" {{ (old('state') == 'NV' ? "selected":"") }}>Nevada</option>
                            <option value="NH" {{ (old('state') == 'NH' ? "selected":"") }}>New Hampshire</option>
                            <option value="NJ" {{ (old('state') == 'NJ' ? "selected":"") }}>New Jersey</option>
                            <option value="NM" {{ (old('state') == 'NM' ? "selected":"") }}>New Mexico</option>
                            <option value="NY" {{ (old('state') == 'NY' ? "selected":"") }}>New York</option>
                            <option value="NC" {{ (old('state') == 'NC' ? "selected":"") }}>North Carolina</option>
                            <option value="ND" {{ (old('state') == 'ND' ? "selected":"") }}>North Dakota</option>
                            <option value="OH" {{ (old('state') == 'OH' ? "selected":"") }}>Ohio</option>
                            <option value="OK" {{ (old('state') == 'OK' ? "selected":"") }}>Oklahoma</option>
                            <option value="OR" {{ (old('state') == 'OR' ? "selected":"") }}>Oregon</option>
                            <option value="PA" {{ (old('state') == 'PA' ? "selected":"") }}>Pennsylvania</option>
                            <option value="RI" {{ (old('state') == 'RI' ? "selected":"") }}>Rhode Island</option>
                            <option value="SC" {{ (old('state') == 'SC' ? "selected":"") }}>South Carolina</option>
                            <option value="SD" {{ (old('state') == 'SD' ? "selected":"") }}>South Dakota</option>
                            <option value="TN" {{ (old('state') == 'TN' ? "selected":"") }}>Tennessee</option>
                            <option value="TX" {{ (old('state') == 'TX' ? "selected":"") }}>Texas</option>
                            <option value="UT" {{ (old('state') == 'UT' ? "selected":"") }}>Utah</option>
                            <option value="VT" {{ (old('state') == 'VT' ? "selected":"") }}>Vermont</option>
                            <option value="VA" {{ (old('state') == 'VA' ? "selected":"") }}>Virginia</option>
                            <option value="WA" {{ (old('state') == 'WA' ? "selected":"") }}>Washington</option>
                            <option value="WV" {{ (old('state') == 'WV' ? "selected":"") }}>West Virginia</option>
                            <option value="WI" {{ (old('state') == 'WI' ? "selected":"") }}>Wisconsin</option>
                            <option value="WY" {{ (old('state') == 'WY' ? "selected":"") }}>Wyoming</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="zip"> Zip Code </label>
                        <input type="text" class="form-control" name="zip" value="{{ old('zip') }}">
                    </div>

                    <div class="form-group">
                        <label for="membership_type"> Membership Type</label>
                        <select class="form-control" name="membership_type">
                            <option value="">Choose a Membership:</option>
                            <option value="plus" {{ (old('membership_type') == 'plus' ? "selected":"") }}>Plus</option>
                            <option value="business" {{ (old('membership_type') == 'business' ? "selected":"") }}>
                                Business
                            </option>
                            <option value="savings" {{ (old('membership_type') == 'savings' ? "selected":"") }}>
                                Savings
                            </option>
                            <option value="trial" {{ (old('membership_type') == 'trial' ? "selected":"") }}>Trial Pass
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="membership_number"> Membership Number</label>
                        <input type="text" class="form-control" name="membership_number"
                               value="{{ old('membership_number') }}">
                    </div>

                </div>
                <div class="col-md-6">
                    <h4>Device Information</h4>

                    <div class="form-group">
                        <label for="devices">Choose Device: </label>

                        <select class="form-control" name="device" id="devices" onchange="loadServices()">
                            <option value="">Choose a Device:</option>
                            @foreach ($devices as $device)
                                <option value="{{ $device->id }}" {{ (old('device') == $device->id ? "selected":"") }}>{{  $device->model }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="color"> Color</label>
                        <input type="text" class="form-control" name="color" value="{{ old('color') }}">
                    </div>

                    <div class="form-group">
                        <label for="serial_number"> Serial Number</label>
                        <input type="text" class="form-control" name="serial_number" value="{{ old('serial_number') }}">
                    </div>

                    <div class="form-group">
                        <label for="carrier"> Carrier</label>
                        <select class="form-control" name="carrier">
                            <option value="">Choose a Carrier:</option>
                            <option value="at&t" {{ (old('carrier') == 'at&t' ? "selected":"") }}>AT&T</option>
                            <option value="sprint" {{ (old('carrier') == 'sprint' ? "selected":"") }}>Sprint</option>
                            <option value="t-mobile" {{ (old('carrier') == 't-mobile' ? "selected":"") }}>T-Mobile
                            </option>
                            <option value="verizon" {{ (old('carrier') == 'verizon' ? "selected":"") }}>Verizon</option>
                            <option value="other" {{ (old('carrier') == 'other' ? "selected":"") }}>Other</option>
                        </select>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="claim" {{ (old('claim') == 'on' ? "checked":"") }}> Square
                            Trade Claim?
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="claim_number"> Claim Number</label>
                        <input type="text" class="form-control" name="claim_number" placeholder="If checked yes"
                               value="{{ old('claim_number') }}">
                    </div>

                    <div class="form-group">
                        <label for="description"> Description</label>
                        <textarea class="form-control" rows="5" name="description">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="store_number"> Store Number</label>
                        <select class="form-control" name="store_number">
                            <option value="">Choose a Store:</option>
                            @foreach(Auth::user()->stores()->get() as $store)
                                <option value="{{ $store->number }}" {{ (old('store_number') == $store->number ? "selected":"") }}>
                                    {{ $store->number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="technician_initials"> Technician Initials</label>
                        <input type="text" class="form-control" name="technician_initials"
                               value="{{ old('technician_initials') }}">
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
                            <tbody id="services">
                            <tr>
                                <td colspan="4" class="alert-warning">Please select a device to view services.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <input type="submit" value="Submit Pricing Form" class="btn btn-block btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script src="/js/pricing-form.js"></script>
    @if (Session::hasOldInput())
        <script>
            // Get the old data from Laravel
            var oldServices = {!! json_encode(old('services')) !!};

            $(function () {
                setTimeout(function () {
                    if ($("#devices").val()) {
                        console.log(oldServices);
                        $.each(oldServices, function (i, item) {
                            if (item.name) {
                                $('[value="' + item.name + '"]').prop('checked', true);
                            }
                        });
                    }
                }, 500);
            });
        </script>
    @endif
@endsection