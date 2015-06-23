@extends('Home.master')

@section('content')

    @if(is_array($phar))
        {{ $phar }}
    @else
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Form for {{$phar->item}}</h3>
                    </div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                            </div>
                        @endif

                        {{ Form::model($phar, array('route' => array('pharmacy.update', $phar->id), 'method' => 'PUT')) }}
                        {{--{{ Form::open(array('url' => 'foo')) }}--}}

                        {{ Form::text('item',null, array('placeholder' =>'Item Name', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::text('quantity',null , array('placeholder' => 'Quantity', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::text('price',null, array('placeholder' => 'Price', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::text('expiry',null, array('placeholder' => 'Expiration Date', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::text('nafdac',null, array('placeholder' => 'Nafdac No', 'class' => 'form-control input-sm')) }}<br>

                        {{ Form::submit('Update', array('class' => 'btn btn-info btn-block register'))}}

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection