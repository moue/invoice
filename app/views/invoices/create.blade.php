<section class="content-header">
    <h1>
        Create New Invoice
    </h1>
</section>

<section class="content">
			    <!-- form start -->
			    {{ Form::open(['route'=>'invoice.store', 'files'=>true]) }}
			    	@include('invoices/partials/_form')
			    	<div class="box-footer">
			        	{{ Form::submit('Create Invoice', array('class'=>'btn bg-purple btn-block')) }}
			     	</div>
			    {{ Form::close() }}

			
</section>      