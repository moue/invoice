<section class="content-header">
    <h1>
        Add New Advertiser
    </h1>
</section>

<section class="content">
    <!-- form start -->
    {{ Form::open(['route'=>'advertiser.store']) }}
    	@include('advertisers/partials/_form')
    	<div class="box-footer">
        	{{ Form::submit('Add Advertiser', array('class'=>'btn bg-purple btn-block')) }}
     	</div>
    {{ Form::close() }}
</section>      