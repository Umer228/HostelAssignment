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
        <th>Hostel</th><th>Capacity</th><th>Status</th><th>Fan</th><th>AC</th><th>Furnished</th><th>Actions</th>
    </tr>
    @foreach($room as $room)
        <tr>
            <td>{{$room->hostel_id}}</td>
            <td>{{$room->capacity}}</td>
            <td>{{$room->status}}</td>
            <td>{{$room->fan}}</td>
            <td>{{$room->ac}}</td>
            <td>{{$room->furnished}}</td>
            <td>
                <form class="form-inline" action={{route( 'rooms.destroy',[ 'id'=>$room->id])}} method="post">
                    @csrf
                    @method('DELETE')
                    <a href={{route( 'rooms.edit',[ 'id'=>$room->id])}} class="btn">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
