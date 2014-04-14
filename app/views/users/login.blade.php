<div class="form-box" id="login-box">
    <div class="header">Sign In</div>
    
    {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
    <div class="body bg-gray">

        {{ Form::text('email', null, array('class'=>'form-group form-control', 'placeholder'=>'Email Address')) }}
        {{ Form::password('password', array('class'=>'form-group form-control', 'placeholder'=>'Password')) }}
     
        
    </div>
    <div class="footer">                    

            {{ Form::submit('Login', array('class'=>'btn bg-purple btn-block'))}}
            {{ HTML::link('users/register', 'Register for an account') }}
            <br>
            {{ link_to_route('forgot.create', 'Forgot my password') }}

    </div>
    {{ Form::close() }}

</div>
