<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>

        <style>

        </style>
        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.js') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/bootstrap.css') }}
    </head>
    <body>
        <div class="row-fluid">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Pharmacy Inventory</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::user())
                                <li><a href="#">Welcome {{ucwords(Auth::user()->firtsname)}} {{ucwords(Auth::user()->lastname)}}</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                            @else
                                <li>{{ HTML::link('login', 'Login') }}</li>
                                <li>{{ HTML::link('register', 'Create User') }}</li>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <div class="span12">
            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3>{{Session::get('message')}}</h3>
                </div>
            @endif

            @yield('content')
        </div>
    </body>
</html>