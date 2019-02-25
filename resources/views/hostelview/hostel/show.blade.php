@extends('hostelview.master.master')

@yield('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

<table class="table" border="">
    @foreach($hosteldata as $host)
        <tr>
            <td>{{$host->id}}</td>
            <td>{{$host->name}}</td>
            <td>{{$host->phone}}</td>
            <td>{{$host->address}}</td>
        </tr>
    @endforeach
</table>
