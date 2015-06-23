@extends('Home.master')

@section('content')


    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create New Users</h3>
                </div>
                <div class="panel-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </div>
                    @endif

                    {{ Form::open(array('url' => 'register')) }}

                        {{ Form::text('firstname', '', array('placeholder' => 'First Name', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::text('lastname', '', array('placeholder' => 'Last Name', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::text('email', '', array('placeholder' => 'Email Address', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::password('password',array('placeholder' => 'Password', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::password('confirm',array('placeholder' => 'Password Confirm', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::select('role', $roles, null, array('class' => 'selectpicker', 'data-width' => '100%')) }} <br>

                        {{ Form::submit('Register', array('class' => 'btn btn-info btn-block register'))}}


                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection