<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Lampoon | Business</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}        
        <!-- font Awesome -->
        {{ HTML::style('css/font-awesome.css') }}
        <!-- Font Styles -->
        {{ HTML::style('css/fonts.css') }}
        <!-- Theme style -->
        {{ HTML::style('css/AdminLTE.css') }}        
    </head>
    <body class="bg-black">
        
        <div class="container">
            @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif

            
        </div>
        
        {{ $content }}

        <!-- jQuery 1.10.2 -->
        {{ HTML::script('packages/bootstrap/js/jquery-1.10.2.min.js') }}
        <!-- Bootstrap -->
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
        <!-- AdminLTE App -->
        {{ HTML::script('js/app.js') }}

    </body>
</html>