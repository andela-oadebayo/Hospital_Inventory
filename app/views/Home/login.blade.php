@extends('Home.master')

@section('content')

<div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Login</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('url' => 'login')) }}
                    @if($errors->any())
                        <div class="alert alert-error">
                            <a href="#" class="close" data-dismiss="alert">$times;</a>
                            {{ implode('', $errors->all('<li class="error":message</li>')) }}
                        </div>
                    @endif
                    {{ Form::text('email', '', array('placeholder' => 'Email Address', 'class' => 'form-control input-sm')) }}<br>

                    {{ Form::text('password', '', array('placeholder' => 'Password', 'class' => 'form-control input-sm')) }}<br>

                    {{ Form::submit('Login', array('class' => 'btn btn-info btn-block'))}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>

@endsection