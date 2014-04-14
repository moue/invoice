<section class="content-header">
    <h1>
        View Invoices
        <small>All Invoices</small>
    </h1>
 
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Your Invoices</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if (empty($invoices))
                        <p class="alert alert-danger">You have not created any invoices yet. Would you like to {{ link_to('invoice/create', 'create') }} an invoice?</p>
                    @else 

                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Invoice #</th>
                                <th>Date</th>
                                <th>Advertiser</th>
                                <th>Total Cost</th>
                                <th>Trade</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr style="text-align:center;">
                                <td>{{ $invoice->id }}</td>
                                <td>{{ date('m/d/Y', strtotime($invoice->created_at)) }}</td>
                                <td>{{ $advertiser_options[$invoice->advertiser_id] }}</td>
                                <td>{{ $invoice->cost }}</td>
                                <td>{{ ($invoice->trade) ? 'Yes' : 'No' }}</td>
                                <td>{{ ($invoice->paid) ? 'Paid' : 'Unpaid' }}</td>
                                <td>{{ link_to('invoice/'.$invoice->id, 'View') }} / {{ link_to('invoice/'.$invoice->id.'/edit', 'Edit') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Invoice #</th>
                                <th>Date</th>
                                <th>Advertiser</th>
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
</section><!-- /.content -->
