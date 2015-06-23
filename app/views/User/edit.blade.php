@extends('Home.master')

@section('content')

    @if(is_array($user))
        {{ $user }}
    @else
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Form for {{$user->lastname}}</h3>
                    </div>
                    <div class="panel-body">
                        {{--@if($errors->any())--}}
                        {{--<div class="alert alert-danger">--}}
                        {{--<a href="#" class="close" data-dismiss="alert">&times;</a>--}}
                        {{--{{ implode('', $errors->all('<li class="error">:message</li>')) }}--}}
                        {{--</div>--}}
                        {{--@endif--}}

                        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
                        {{--{{ Form::open(array('url' => 'foo')) }}--}}

                        {{ Form::text('firstname',null, array( 'class' => 'form-control input-sm', 'readonly')) }}<br>

                        {{ Form::text('lastname',null , array('placeholder' => 'Last Name', 'class' => 'form-control input-sm', 'readonly')) }}<br>

                        {{ Form::text('email',null, array('placeholder' => 'Email Address', 'class' => 'form-control input-sm', 'readonly')) }}<br>

                        {{ Form::select('role', $roles, null, array('class' => 'selectpicker', 'data-width' => '100%')) }} <br>

                        {{ Form::submit('Update', array('class' => 'btn btn-info btn-block register'))}}

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection