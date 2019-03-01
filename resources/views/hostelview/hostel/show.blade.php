@extends('hostelview.master.master')

@yield('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }} :{{ old('name') }}
    </div>
@endif
@if (session('key'))
    <div class="alert alert-success">
        {!! session('key') !!}
    </div>

@endif

<table class="table" border="">
    <tr>
        <th>#</th><th>Name</th></th><th>Phone</th><th>Address</th><th>Actions</th></th>
    </tr>
    @foreach($hosteldata as $host)
        <tr>
            <td>{{$host->id}}</td>
            <td>{{$host->name}}</td>
            <td>{{$host->phone}}</td>
            <td>{{$host->address}}</td>
            <td>
                {{--<form class="form-inline" action={{route( 'departments.destroy',
                     [ 'id'=>$department->id])}} method="post"> @csrf @method('DELETE')>--}}

                <form class="form-inline" action={{route( 'hostels.destroy',[ 'id'=>$host->id])}} method="post">
                @csrf
                @method('DELETE')
                <a href={{route( 'hostels.edit',[ 'id'=>$host->id])}} class="btn">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
