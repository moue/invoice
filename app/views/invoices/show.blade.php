<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Order Invoice
                    </h1>
                </section>

                <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Note:</b> This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                    </div>
                </div>

                <!-- Main content -->
                <section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                The Harvard Lampoon
                                @foreach($invoices as $invoice)
                                <small class="pull-right"></small>
                                @endforeach
                                <small>
                                    44 Bow Street, Cambridge, MA 02138
                                    <br>
                                    <span style="padding-right: 10px;">(617) 495-7801</span>
                                    <span>Fax: (617) 495-1668</span>
                                </small>

                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                                <strong>{{ $advertiser->advertiser }}</strong><br>
                                {{ $advertiser->address }}<br>
                                {{ $advertiser->city }}, {{ $advertiser->state }} {{ $advertiser->zipcode }} <br>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <address>
                                {{ $advertiser->contact }}, {{ $advertiser->position }}<br>
                                {{ "(".substr($advertiser->telephone, 0, 3).") ".substr($advertiser->telephone, 3, 3)."-".substr($advertiser->telephone,6) }}<br/>
                                {{ $advertiser->email }}
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Date:</b> {{ date('m/d/Y', strtotime($invoice->created_at)) }}<br/>
                            <b>Order ID: {{ $invoice->invoice_id }}</b><br/>
                            <b>Sales Contact:</b> {{ $sales_contact }}<br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="2">Size and brief description of ad</th>
                                        <th colspan="5">Issue Number</th>
                                        <th>Cost of Ad</th>
                                        <th>Charges/Discounts</th>
                                        <th>Total Cost</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    @foreach($invoices as $invoice)
                                    <tr style="text-align:center;">
                                        <td style="text-align:left;">{{ $size_options[$invoice->size_id] }}</td>
                                        <td style="text-align:left;">{{ (($invoice->image) ?  HTML::link(URL::asset('img/snakebite.jpg'), $invoice->description) : $invoice->description) }}</td>
                                        <td>{{ ($invoice->issue_1) ? '1' : '' }}</td>
                                        <td>{{ ($invoice->issue_2) ? '2' : '' }}</td>
                                        <td>{{ ($invoice->issue_3) ? '3' : '' }}</td>
                                        <td>{{ ($invoice->issue_4) ? '4' : '' }}</td>
                                        <td>{{ ($invoice->issue_5) ? '5' : '' }}</td>
                                        <td>{{ $invoice->subcost }}</td>
                                        <td>{{ $invoice->discount }}</td>
                                        <td>{{ $invoice->cost }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">
                            <!--<p class="lead">Additional Information:</p>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                {{ $invoice->notes }}
                            </p>-->
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <h4 class="text-right">Total Cost: {{ $total }}</h4>
                            <h4 class="text-right">Trade: {{ ($invoice->trade) ? 'Yes' : 'No' }}</h4>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <hr>
                            <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-wrench"></i> Edit</button>
                        </div>
                    </div>
                </section><!-- /.content -->