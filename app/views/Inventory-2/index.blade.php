@extends('Home.master')

@section('content')

    @if(!$items->count())
        <h3>You have no user</h3>
    @else
        <table class = 'table table-hover'>
            <thead>
            <tr>
                <th>No</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Expiration Date</th>
                <th>Nafdac Number</th>
                <th>Pharmacy</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($items as $item)
                <tbody>
                <td>{{$item->item}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->expiry}}</td>
                <td>{{$item->nafdac}}</td>
                <td>{{$item->pharmacy_id}}</td>
                <td><a class="btn btn-small btn-info" href="{{ URL::to('pharmacy/' . $item->id . '/edit') }}">Edit</a></td>
                <td>
                    {{ Form::open(array('url' => 'pharmacy/' . $item->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
                </tbody>
            @endforeach
        </table>
    @endif


@endsection