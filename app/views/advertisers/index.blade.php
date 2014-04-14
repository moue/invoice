<section class="content-header">
    <h1>
        Advertisers
        <small>View all relationships with advertisers</small>
    </h1>
 
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">My Advertisers</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if (empty($my_advertisers))
                        <p class="alert alert-danger">No relationships found.</p>
                    @else 

                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Advertiser</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Invoices</th>
                                <th>Sales Contact</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($my_advertisers as $advertiser)
                            <tr style="text-align:center;">
                                <td>{{ $advertiser->advertiser }}</td>
                                <td>{{ $advertiser->contact }}</td>
                                <td>{{ $advertiser->email }}</td>
                                <td>{{ link_to('advertiser/'.$advertiser->id, empty($advertiser->invoice) ? '0' : $advertiser->invoice->count()) }}</td>
                                <td>{{ $username }}</td>
                                <td>{{ link_to('advertiser/'.$advertiser->id.'/edit', 'Edit') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Advertiser</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Invoices</th>
                                <th>Sales Contact</th>
                                <th>Details</th>
                            </tr>
                        </tfoot>
                    </table>
                    @endif
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Advertisers</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    @if (empty($all_advertisers))
                        <p class="alert alert-danger">No relationships found.</p>
                    @else 

                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Advertiser</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Invoices</th>
                                <th>Sales Contact</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($all_advertisers as $advertiser)
                            <tr style="text-align:center;">
                                <td>{{ $advertiser->advertiser }}</td>
                                <td>{{ $advertiser->contact }}</td>
                                <td>{{ $advertiser->email }}</td>
                                <td>{{ link_to('advertiser/'.$advertiser->id, empty($advertiser->invoice) ? '0' : $advertiser->invoice->count()) }}</td>
                                <td>{{ Advertiser::find($advertiser->id)->user->first_name }} {{ Advertiser::find($advertiser->id)->user->last_name }}</td>
                                <td>{{ link_to('advertiser/'.$advertiser->id.'/edit', 'Edit') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Advertiser</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Invoices</th>
                                <th>Sales Contact</th>
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
