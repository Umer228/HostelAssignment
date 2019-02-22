@extends('hostelview.master.master')

@yield('content')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Room Registration</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
   {{-- <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>--}}
</head>
<body>
<div class="flex-center position-ref full-height">
    <form action={{route('createroom.store')}} method="post">
        @csrf
        <table>
            <tr>
                <td>Select Hostel: </td>
                <td><select name="hostel_id">
                        <option value="">--Select--</option>
                        @foreach($hosteldata as $hostel)
                            <option value={{$hostel->id}}>{{$hostel->name}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Room Capacity: </td>
                <td><input type="text" name="capacity"></td>
            </tr>
            <tr>
                <td>Room Status: </td>
                <td>
                    <select name="status">
                        <option value="">--Select--</option>
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Fan Facility</td>
                <td><input type="radio" name="fan" value="1">Yes
                    <input type="radio" name="fan" value="0">No
                </td>
            </tr>
            <tr>
                <td>AC Facility</td>
                <td><input type="radio" name="ac" value="1">Yes
                    <input type="radio" name="ac" value="0">No
            </tr>
            <tr>
                <td>Furnished</td>
                <td><input type="radio" name="furnished" value="1">Yes
                    <input type="radio" name="furnished" value="0">No
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Add Room"></td>
            </tr>
        </table>
    </form>
</div>

{{--retriving data from hostels table and storing data into a variable--}}
{{--retriving data from database--}}
<table class="table" border="">
    <tr align="center">
        <th>id</th><th>Hostel Id</th><th>Room Capacity</th>
        <th>Room Status</th><th>Fan Facility</th><th>Ac Facility</th>
        <th>Furnished</th>
    </tr>

    @foreach($roomdata as $room)
        <tr>
            <td>{{$room->id}}</td>
            <td>{{$room->hostel_id}}</td>
            <td>{{$room->capacity}}</td>
            <td>{{$room->status}}</td>
            <td>{{$room->fan}}</td>
            <td>{{$room->ac}}</td>
            <td>{{$room->furnished}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>

