<section class="content-header">
    <h1>
        View Invoices
        <small>{{ $advertiser->advertiser }}</small>
    </h1>
</section>

<section class="content">
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Invoices</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if (empty($invoice))
                        <p class="alert alert-danger">No invoices associated with this advertiser. Would you like to {{ link_to('invoice/create', 'create') }} an invoice?</p>
                    @else 

                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Invoice #</th>
                                <th>Date</th>
                                <th style="text-align:left;">Advertiser</th>
                                <th>Number of Items</th>
                                <th>Total Cost</th>
                                <th>Trade</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr style="text-align:center;">
                                <td>{{ $invoice->invoice_id }}</td>
                                <td style="text-align:left;">{{ $invoice->advertiser }}</td>
                                <td>{{ ($count) }}</td>
                                <td>{{ $invoice->cost }}</td>
                                <td>{{ ($invoice->trade) ? 'Yes' : 'No' }}</td>
                                <td>{{ link_to('invoice/'.$invoice->id, 'View') }} / {{ link_to('invoice/'.$invoice->id.'/edit', 'Edit') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Invoice #</th>
                                <th>Date</th>
                                <th style="text-align:left;">Advertiser</th>
                                <th>Number of Items</th>
                                <th>Total Cost</th>
                                <th>Trade</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </tfoot>
                    </table>
                    @endif
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
            
</section>      