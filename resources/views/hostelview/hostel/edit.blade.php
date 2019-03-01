@extends('hostelview.master.master')

@yield('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
{{-------------------------------------------------------------------------------------------------}}

<div class="flex-center position-ref full-height">
    <form action={{route('hostels.update',['id'=>$hostel->id])}} method="post">
        @csrf @method('PUT')
        <table>
            <tr>
                <td><label for="hotelname" class="col"> Hostel Name: </label></td>
                <td><input type="text" name="name" value=""></td>
            </tr>
            <tr>
                <td><label for="phonenumber" class="col">Phone No: </label></td>
                <td><input type="text" name="phone" value=""></td>
            </tr>
            <tr>
                <td><label for="address" class="col"> Address </label></td>
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
