@extends('layouts.hostelApp')

@section('content')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hostel Registration</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
</head>
<body>
<div class="flex-center position-ref full-height">
    <form action={{route('createhostel.store')}} method="post">
        @csrf
        <table>
            <tr><td>Hostel Name:</td>
                <td><input type="text" name="name" value="alhamd"></td>
            </tr>
            <tr>
                <td>Phone No: </td>
                <td><input type="text" name="phone" value="0300221211"></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><textarea type="text" name="address" ></textarea></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Add Hostel"></td>
            </tr>

        </table>
    </form>
</div>
{{---------------------------------------------------------------------------------}}
{{--retriving data from database--}}
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
</body>
</html>

@endsection
