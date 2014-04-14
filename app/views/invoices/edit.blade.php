<section class="content-header">
    <h1>
        Edit Existing Invoice
        <small>Invoice #{{ $invoices->id }}</small>
    </h1>
</section>

<section class="content">
    {{ Form::model($advertiser, ['method'=>'PATCH', 'route'=>['invoice.update', $invoices->id], 'files'=>true]) }}
    	@include('invoices/partials/_form')
    	<div class="box-footer">
        	{{ Form::submit('Update Invoice', array('class'=>'btn bg-purple btn-block')) }}
     	</div>
    {{ Form::close() }}
</section>      
