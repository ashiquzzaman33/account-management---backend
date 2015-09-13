<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/font-awesome.min.css') }}
        {{ HTML::style('css/main.css') }}
        {{ HTML::style('css/datepicker.min.css') }}
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
        {{ HTML::script('js/vendor/jquery-1.10.2.min.js') }}
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        @yield('content')
        

        
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/datepicker.min.js') }}
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/main.js') }}

    </body>
</html>
