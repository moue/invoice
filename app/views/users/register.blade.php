<div class="form-box" id="login-box">
    <div class="header">Register New Membership</div>
    
    {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
    <div class="body bg-gray">
        <dl>
            @foreach($errors->all() as $error)
                <dd style="color: #b94a48;">{{ $error }}</dd>
            @endforeach
        </dl>

        {{ Form::text('first_name', null, array('class'=>'form-group form-control', 'placeholder'=>'First Name')) }}
        {{ Form::text('last_name', null, array('class'=>'form-group form-control', 'placeholder'=>'Last Name')) }}
        {{ Form::text('email', null, array('class'=>'form-group form-control', 'placeholder'=>'Email Address')) }}
        {{ Form::password('password', array('class'=>'form-group form-control', 'placeholder'=>'Password')) }}
        {{ Form::password('password_confirmation', array('class'=>'form-group form-control', 'placeholder'=>'Confirm Password')) }}
     
        
    </div>
    <div class="footer">                    

            {{ Form::submit('Register', array('class'=>'btn bg-purple btn-block'))}}
            {{ HTML::link('users/login', 'I already have an account') }}

    </div>
    {{ Form::close() }}

</div>

