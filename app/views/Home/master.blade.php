<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>

        <style>

        </style>
        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.js') }}
        {{ HTML::script('js/bootstrap-select.js') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-select.css') }}
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
                            @if(Auth::user() && Auth::user()->role == 'admin')
                                <li><a href="#">Welcome {{ucwords(Auth::user()->firstname)}}</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>{{ HTML::link('/inventory-1', 'Pharmacy-1') }}</li>
                                        <li>{{ HTML::link('/inventory-2', 'Pharmacy-2') }}</li>
                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('pharmacy/create') }}">Add Item</a></li>
                                <li>{{ HTML::link('/admin', 'Users') }}</li>
                                <li>{{ HTML::link('register', 'Create User') }}</li>
                                <li>{{ HTML::link('logout', 'Logout') }}</li>
                            @elseif(Auth::user() && Auth::user()->role == 'pharmacy1')
                                <li><a href="#">Welcome {{ucwords(Auth::user()->firstname)}}</a></li>
                                <li><a href="{{ URL::to('inventory-1') }}">Home</a></li>
                                <li><a href="{{ URL::to('pharmacy/create') }}">Add Item</a></li>
                                <li>{{ HTML::link('logout', 'Logout') }}</li>
                            @elseif(Auth::user() && Auth::user()->role == 'pharmacy2')
                                <li><a href="#">Welcome {{ucwords(Auth::user()->firstname)}}</a></li>
                                <li><a href="{{ URL::to('pharmacy/create') }}">Add Item</a></li>
                                <li><a href="{{ URL::to('inventory-2') }}">Home</a></li>
                                <li>{{ HTML::link('logout', 'Logout') }}</li>
                            @else
                                <li>{{ HTML::link('login', 'Login') }}</li>
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