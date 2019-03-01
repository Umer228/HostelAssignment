@extends('hostelview.master.master')

@yield('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
{{-------------------------------------------------------------------------------------------------}}

<div class="flex-center position-ref full-height">
    <form action={{route('rooms.update',['id'=>$room->id])}} method="post">
        @csrf @method('PUT')
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
