@extends('hostelview.master.master')

@yield('content')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
<div class="flex-center position-ref full-height">
    <form action={{route('peoples.store')}} method="post">
        @csrf
        <table>
            <tr>
                <td>Select Hostel: </td>
                <td><select id="hostel" class="hostelname" name="hostel_id">
                        <option value="0" selected disabled>Select Hostel</option>
                        @foreach($hosteldata as $hostel)
                            <option value={{$hostel->id}}>{{$hostel->name}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Select Room type </td>
            </tr>
            <tr>
                <td>Room Capacity: </td>
                <td><select id="capacity" name="room_id" class="roomcapacity">
                        <option value="0" selected disabled>Choose Hostel</option>
                    </select></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><input type="checkbox" name="status" value="" id="status" disabled>Yes
                    <input type="checkbox" name="status" value="" id="statusno" disabled>No</td>
            </tr>
            <tr>
                <td>AC:</td>
                <td><input type="checkbox" name="ac" value="" id="ac" disabled>Yes
                    <input type="checkbox" name="ac" value="" id="acno" disabled>No</td>
            </tr>
            <tr>
                <td>Fan:</td>
                <td><input type="checkbox" name="fan" value="" id="fan" disabled>Yes
                    <input type="checkbox" name="fan" value="" id="fanno" disabled>No
                </td>
            </tr>
            <tr>
                <td>Furnished Room:</td>
                <td><input type="checkbox" name="furnished" value="" id="furnished" disabled>Yes
                    <input type="checkbox" name="furnished" value="" id="furnishedno" disabled>No
            </tr>
            <tr></tr>
            <tr>
                <td>User Information</td>
            </tr>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" value="" id="name" placeholder="Enter full name"></td>
            </tr>
            <tr>
                <td>CNIC: </td><td>
                    <input type="text" name="cnic" value="" id="cnic" placeholder="00000-0000000-0"></td>
            </tr>
            <tr>
                <td>Address: <td>
                    <textarea type="text" name="address" placeholder="Enter Complete Address"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Book Room"></td>
            </tr>
        </table>
    </form>
</div>
