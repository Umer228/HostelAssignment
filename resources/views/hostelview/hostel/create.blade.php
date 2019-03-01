@extends('hostelview.master.master')

@yield('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
{{-------------------------------------------------------------------------------------------------}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="flex-center position-ref full-height">
    <form action={{route('hostels.store')}} method="post">
        @csrf
        <table>
            <tr><td>Hostel Name:</td>
                <td><input type="text" name="name" value=""></td>
            </tr>
            <tr>
                <td>Phone No: </td>
                <td><input type="text" name="phone" value=""></td>
            </tr>
            <tr>
                <td>Address: </td>
                <td><textarea type="text" name="address" ></textarea></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Add Hostel"></td>
            </tr>
            {{--<tr>
                <a class="nav-link" href="{{ route('hostels.show') }}">
                    {{ __('Search Hostel') }}
                </a>
            </tr>--}}

        </table>
    </form>
</div>

{{---------------------------------------------------------------------------------}}
{{--retriving data from database--}}
{{--
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
--}}

