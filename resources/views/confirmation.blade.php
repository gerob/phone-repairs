@extends('template')

@section('content')

    <div class="panel-heading">
        <h4 class="panel-title">Mobile Device Repair Pricing Portal</h4>
    </div>

    <div class="panel-body">
        <form action="{{ route('orders.list.store', $order->store_number) }}" method="get">
            <div class="center-all">
                <button type="button" class="btn btn-default" onclick="window.print()">Print</button>
                <button type="submit" class="btn btn-success">Finish</button>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h4>Customer Information</h4>

                    <strong>First Name: </strong> {{ $order->first_name }} <br>
                    <strong>Last Name: </strong> {{ $order->last_name }} <br>
                    <strong>Email: </strong> {{ $order->email }} <br>
                    <strong>Address: </strong> {{ $order->address }} <br>
                    <strong>Address2: </strong> {{ $order->address2 }} <br>
                    <strong>Address: </strong> {{ $order->address }} <br>
                    <strong>City: </strong> {{ $order->city }} <br>
                    <strong>State: </strong> {{ $order->state }} <br>
                    <strong>Zip Code: </strong> {{ $order->zip }} <br>
                    <strong>Phone Number: </strong> {{ $order->phone }} <br>
                    <strong>Member Type: </strong> {{ $order->member_type }} <br>
                    <strong>Member Number: </strong> {{ $order->member_number }} <br>
                </div>
                <div class="col-md-6">
                    <h4>Device Information</h4>

                    <strong>Device: </strong> {{ $order->device_name }} <br>
                    <strong>Color: </strong> {{ $order->color }} <br>
                    <strong>Carrier: </strong> {{ $order->carrier }} <br>
                    <strong>Claim: </strong> {{ $order->claim == 'on' ? 'Square Trade Claim' : '' }} <br>
                    <strong>Claim Number: </strong> {{ $order->claim_number }} <br>
                    <strong>Description: </strong> {{ $order->description }} <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td><h4>Repair Description</h4></td>
                                <td><h4>Repair UPC</h4></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $index => $service)
                                <tr>
                                    <td>{{ $index + 1 }} {{ $service['name'] }} - ${{ number_format(($service['price']/100), 2) }}</td>
                                    <td>
                                        <img src="{{ \DNS1D::getBarcodePNGPath($service['upc'], "UPCA") }}"
                                             alt="{{ $service['upc'] }}"/>

                                        <p>{{ $service['upc'] }}</p>
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
                    <h5>Terms and Conditions</h5>

                    <p>PLEASE READ THE FOLLOWING TERMS AND CONDITIONS OF USE CAREFULLY BEFORE USING THIS WEBSITE. All
                        users of
                        this site agree that access to and use of this site are subject to the following terms and
                        conditions and
                        other applicable law. If you do not agree to these terms and conditions, please do not use this
                        site.</p>

                    <h5>Copyright</h5>

                    <p>The entire content included in this site, including but not limited to text, graphics or code is
                        copyrighted
                        as a collective work under the United States and other copyright laws, and is the property of
                        Werx Repair Services.
                        The collective work includes works that are licensed to Werx Repair Services. Copyright 2003,
                        Werx Repair Services
                        ALL RIGHTS RESERVED. Permission is granted to electronically copy and print hard copy portions
                        of this site for the
                        sole purpose of placing an order with Werx Repair Services or purchasing Werx Repair Services
                        products. You may
                        display and, subject to any expressly stated restrictions or limitations relating to specific
                        material, download
                        or print portions of the material from the different areas of the site solely for your own
                        non-commercial use, or
                        to place an order with Werx Repair Services or to purchase Werx Repair Services products. Any
                        other use, including
                        but not limited to the reproduction, distribution, display or transmission of the content of
                        this site is strictly
                        prohibited, unless authorized by Werx Repair Services. You further agree not to change or delete
                        any proprietary
                        notices from materials downloaded from the site. </p>

                    <h5>Trademarks</h5>

                    <p>All trademarks, service marks and trade names of Werx Repair Services used in the site are
                        trademarks
                        or registered trademarks of Werx Repair Services </p>

                    <h5>Warranty Disclaimer</h5>

                    <p>This site and the materials and products on this site are provided "as is" and without warranties
                        of any
                        kind, whether express or implied. To the fullest extent permissible pursuant to applicable law,
                        Werx Repair
                        Services disclaims all warranties, express or implied, including, but not limited to, implied
                        warranties of
                        merchantability and fitness for a particular purpose and non-infringement. Werx Repair Services
                        does not
                        represent or warrant that the functions contained in the site will be uninterrupted or
                        error-free, that
                        the defects will be corrected, or that this site or the server that makes the site available are
                        free of
                        viruses or other harmful components. Werx Repair Services does not make any warrantees or
                        representations
                        regarding the use of the materials in this site in terms of their correctness, accuracy,
                        adequacy, usefulness,
                        timeliness, reliability or otherwise. Some states do not permit limitations or exclusions on
                        warranties, so
                        the above limitations may not apply to you.</p>

                    <h5>Limitation of Liability</h5>

                    <p>Werx Repair Services shall not be liable for any special or consequential damages that result
                        from the use
                        of, or the inability to use, the materials on this site or the performance of the products, even
                        if Werx
                        Repair Services has been advised of the possibility of such damages. Applicable law may not
                        allow the limitation
                        of exclusion of liability or incidental or consequential damages, so the above limitation or
                        exclusion may not
                        apply to you.</p>

                    <h5>Typographical Errors</h5>

                    <p>In the event that a Werx Repair Services product is mistakenly listed at an incorrect price, Werx
                        Repair Services
                        reserves the right to refuse or cancel any orders placed for product listed at the incorrect
                        price. Werx Repair
                        Services reserves the right to refuse or cancel any such orders whether or not the order has
                        been confirmed and
                        your credit card charged. If your credit card has already been charged for the purchase and your
                        order is
                        cancelled, Werx Repair Services shall issue a credit to your credit card account in the amount
                        of the incorrect
                        price. </p>

                    <h5>Term; Termination</h5>

                    <p>These terms and conditions are applicable to you upon your accessing the site and/or completing
                        the registration
                        or shopping process. These terms and conditions, or any part of them, may be terminated by Werx
                        Repair Services
                        without notice at any time, for any reason. The provisions relating to Copyrights, Trademark,
                        Disclaimer,
                        Limitation of Liability, Indemnification and Miscellaneous, shall survive any termination. </p>

                    <h5>Notice</h5>

                    <p>Werx Repair Services may deliver notice to you by means of e-mail, a general notice on the site,
                        or by other
                        reliable method to the address you have provided to Werx Repair Services. </p>


                    <h5>Miscellaneous</h5>

                    <p>Your use of this site shall be governed in all respects by the laws of the state of Texas,
                        U.S.A., without regard
                        to choice of law provisions, and not by the 1980 U.N. Convention on contracts for the
                        international sale of goods.
                        You agree that jurisdiction over and venue in any legal proceeding directly or indirectly
                        arising out of or relating
                        to this site (including but not limited to the purchase of Werx Repair Services products) shall
                        be in the state or
                        federal courts located in Texas. Any cause of action or claim you may have with respect to the
                        site (including but
                        not limited to the purchase of Werx Repair Services products) must be commenced within one (1)
                        year after the claim
                        or cause of action arises. Werx Repair Services&rsquo;s failure to insist upon or enforce strict
                        performance of any
                        provision of these terms and conditions shall not be construed as a waiver of any provision or
                        right. Neither the
                        course of conduct between the parties nor trade practice shall act to modify any of these terms
                        and conditions.
                        Werx Repair Services may assign its rights and duties under this Agreement to any party at any
                        time without notice
                        to you. </p>

                    <h5>Use of Site</h5>

                    <p>Harassment in any manner or form on the site, including via e-mail, chat, or by use of obscene or
                        abusive
                        language, is strictly forbidden. Impersonation of others, including a Werx Repair Services or
                        other licensed
                        employee, host, or representative, as well as other members or visitors on the site is
                        prohibited. You may not
                        upload to, distribute, or otherwise publish through the site any content which is libelous,
                        defamatory, obscene,
                        threatening, invasive of privacy or publicity rights, abusive, illegal, or otherwise
                        objectionable which may
                        constitute or encourage a criminal offense, violate the rights of any party or which may
                        otherwise give rise to
                        liability or violate any law. You may not upload commercial content on the site or use the site
                        to solicit others
                        to join or become members of any other commercial online service or other organization. </p>

                    <h5>Participation Disclaimer</h5>

                    <p>Werx Repair Services does not and cannot review all communications and materials posted to or
                        created by users
                        accessing the site, and is not in any manner responsible for the content of these communications
                        and materials.
                        You acknowledge that by providing you with the ability to view and distribute user-generated
                        content on the site,
                        Werx Repair Services is merely acting as a passive conduit for such distribution and is not
                        undertaking any
                        obligation or liability relating to any contents or activities on the site. However, Werx Repair
                        Services reserves
                        the right to block or remove communications or materials that it determines to be (a) abusive,
                        defamatory, or
                        obscene, (b) fraudulent, deceptive, or misleading, (c) in violation of a copyright, trademark
                        or; other intellectual
                        property right of another or (d) offensive or otherwise unacceptable to Werx Repair Services in
                        its sole discretion.</p>

                    <h5>Indemnification</h5>

                    <p>You agree to indemnify, defend, and hold harmless Werx Repair Services, its officers, directors,
                        employees, agents,
                        licensors and suppliers (collectively the "Service Providers") from and against all losses,
                        expenses, damages and
                        costs, including reasonable attorneys&rsquo; fees, resulting from any violation of these terms
                        and conditions or
                        any activity related to your account (including negligent or wrongful conduct) by you or any
                        other person accessing
                        the site using your Internet account.</p>

                    <h5>Third-Party Links</h5>

                    <p>In an attempt to provide increased value to our visitors, Werx Repair Services may link to sites
                        operated by third
                        parties. However, even if the third party is affiliated with Werx Repair Services, Werx Repair
                        Services has no
                        control over these linked sites, all of which have separate privacy and data collection
                        practices, independent
                        of Werx Repair Services.</p>
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
            <div class="row">
                <div class="col-xs-12">
                    <hr>
                    <br>
                    <img src="/img/samsForm.jpg" alt="Technicians Form" class="img-responsive">
                </div>
            </div>
        </form>
    </div>
@endsection