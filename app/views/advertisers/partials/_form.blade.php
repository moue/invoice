@if (!empty($errors->all()))
<div class="alert alert-danger">
    <i class="fa fa-ban"></i>
    @foreach($errors->all() as $error)
        <dd style="color: #b94a48;">{{ $error }}</dd>
    @endforeach
</div>
@endif

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
		        <h3 class="box-title">Advertiser Information</h3>
		    </div><!-- /.box-header -->
			<div class="box-body">
			    <div class="form-group">
			        {{ Form::label('user_options', 'Sales Contact') }}
			        {{ Form::select('user_options', $user_options, Auth::user()->id, array('class'=>'form-control')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('advertiser', 'Advertiser') }}
			        {{ Form::text('advertiser', null, array('class'=>'form-control', 'placeholder'=>'Advertiser')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('address', 'Address') }}
			        {{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
			    </div>
			    <div class="row">
				    <div class="col-xs-5">
					    <div class="form-group">
					        {{ Form::label('city', 'City') }}
					        {{ Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'City')) }}
					    </div>
					</div>
					<div class="col-xs-3">
					    <div class="form-group">
					        {{ Form::label('state', 'State') }}
					        {{ Form::text('state', null, array('class'=>'form-control', 'placeholder'=>'State')) }}
					    </div>
					</div>
					<div class="col-xs-4">
					    <div class="form-group">
					        {{ Form::label('zipcode', 'Zipcode') }}
					        {{ Form::text('zipcode', null, array('class'=>'form-control', 'placeholder'=>'Zipcode')) }}
					    </div>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
	<div class="col-md-6" data-right-height-content>
		<div class="box box-primary">
			<div class="box-header">
		        <h3 class="box-title">Contact Information</h3>
		    </div><!-- /.box-header -->
			<div class="box-body">
			    <div class="form-group">
			        {{ Form::label('contact', 'Contact') }}
			        {{ Form::text('contact', null, array('class'=>'form-control', 'placeholder'=>'Contact')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('position', 'Position') }}
			        {{ Form::text('position', null, array('class'=>'form-control', 'placeholder'=>'Position')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('telephone', 'Telephone') }}
			        {{ Form::text('telephone', null, array('class'=>'form-control', 'placeholder'=>'Telephone')) }}
			    </div>
			    <div class="form-group">
			        {{ Form::label('email', 'Email') }}
			        {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
			    </div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>


