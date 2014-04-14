<div class="form-box" id="login-box">
    <div class="header">Reset Your Password Now</div>
    
    {{ Form::open(['route'=>'forgot.store', 'class'=>'form-signin']) }}
    {{ Form::hidden('token', $token) }}
    <div class="body bg-gray">
        <dl>
            @foreach($errors->all() as $error)
                <dd style="color: #b94a48;">{{ $error }}</dd>
            @endforeach
        </dl>
        {{ Form::text('email', null, array('class'=>'form-group form-control', 'placeholder'=>'Email Address')) }}
        {{ Form::password('password', array('class'=>'form-group form-control', 'placeholder'=>'Password')) }}
        {{ Form::password('password_confirmation', array('class'=>'form-group form-control', 'placeholder'=>'Confirm Password')) }}
        
    </div>
    <div class="footer">                    

            {{ Form::submit('Create New Password', array('class'=>'btn bg-purple btn-block'))}}

    </div>
    {{ Form::close() }}

</div>
