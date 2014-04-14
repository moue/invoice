<div class="form-box" id="login-box">
    <div class="header">Reset Password</div>
    
    {{ Form::open(['route'=>'forgot.store', 'class'=>'form-signin']) }}
    <div class="body bg-gray">
        <dl>
            @foreach($errors->all() as $error)
                <dd style="color: #b94a48;">{{ $error }}</dd>
            @endforeach
        </dl>
        {{ Form::text('email', null, array('class'=>'form-group form-control', 'placeholder'=>'Email Address')) }}
     
        
    </div>
    <div class="footer">                    

            {{ Form::submit('Reset', array('class'=>'btn bg-purple btn-block'))}}
            {{ HTML::link('users/login', 'I remembered my password!') }}
            <br>
            {{ HTML::link('users/register', 'Register for an account') }}
            

    </div>
    {{ Form::close() }}

</div>
