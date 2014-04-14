<section class="content-header">
    <h1>
        Edit Advertiser Information
    </h1>
</section>

<section class="content">
    <!-- form start -->
    {{ Form::model($advertiser, ['method'=>'PATCH', 'route'=>['advertiser.update', $advertiser->id]]) }}
        @include('advertisers/partials/_form')
        <div class="box-footer">
            {{ Form::submit('Edit Advertiser', array('class'=>'btn bg-purple btn-block')) }}
        </div>
    {{ Form::close() }}
            
</section>      