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
        <th>Hostel</th><th>Room</th></th><th>Name</th><th>CNIC</th><th>Address</th>
    </tr>
    @foreach($people as $people)
        <tr>
            <td>{{$people->hostel_id}}</td>
            <td>{{$people->room_id}}</td>
            <td>{{$people->name}}</td>
            <td>{{$people->cnic}}</td>
            <td>{{$people->address}}</td>
            <td>
                <form class="form-inline" action={{route( 'peoples.destroy',[ 'id'=>$people->id])}} method="post">
                    @csrf
                    @method('DELETE')
                    <a href={{route( 'peoples.destroy',[ 'id'=>$people->id])}} class="btn">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
