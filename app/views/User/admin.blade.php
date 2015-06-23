@extends('Home.master')

@section('content')

    @if(!$users->count())
       <h3>You have no user</h3>
    @else
        <table class = 'table table-hover'>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            @foreach($users as $user)
                <tbody>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td><a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit</a></td>
                    <td>
                        {{ Form::open(array('url' => 'users/' . $user->id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tbody>
            @endforeach
        </table>
    @endif


@endsection