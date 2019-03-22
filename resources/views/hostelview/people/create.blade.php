@extends('hostelview.master.master')

@yield('content')

    <title>Booking Room</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
{{--=======================================================================================--}}
    {{--Java Script--}}



{{--=======================================================================================--}}
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
    <form action={{route('peoples.store')}} method="post">
        @csrf
        <table>
            <tr>
                <td>Select Hostel: </td>
                <td><select id="hostel" class="hostel" name="hostel_id">
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
                <td><select id="room" name="room_id" class="room" data-dependent>
                        <option value="0" selected disabled>Select capacity</option>
                        @foreach($roomdata as $room)
                        <option value={{$room->id}}>{{$room->id}}</option>
                        @endforeach
                    </select></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><input type="checkbox" name="status" value="" id="status" >Yes
                    <input type="checkbox" name="status" value="" id="status" >No</td>
            </tr>
            <tr>
                <td>AC:</td>
                <td><input type="checkbox" name="ac" value="" id="ac" >Yes
                    <input type="checkbox" name="ac" value="" id="ac" >No</td>
            </tr>
            <tr>
                <td>Fan:</td>
                <td><input type="checkbox" name="fan" value="" id="fan" >Yes
                    <input type="checkbox" name="fan" value="" id="fan" >No
                </td>
            </tr>
            <tr>
                <td>Furnished Room:</td>
                <td><input type="checkbox" name="furnished" value="" id="furnished" >Yes
                    <input type="checkbox" name="furnished" value="" id="furnished" >No
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
                    <textarea type="text" name="address" id="address" placeholder="Enter Complete Address"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Book Room"></td>
            </tr>
        </table>
    </form>
</div>
{{--retriving data from database--}}
{{--
<table class="table" border="">
    <tr>
        <th>id</th><th>Hostel Id</th><th>Room Id</th>
        <th>Name</th><th>CNIC</th><th>Address</th>
    </tr>
    @foreach($peopledata as $people)
        <tr>
            <td>{{$people->id}}</td>
            <td>{{$people->hostel_id}}</td>
            <td>{{$people->room_id}}</td>
            <td>{{$people->name}}</td>
            <td>{{$people->cnic}}</td>
            <td>{{$people->address}}</td>
        </tr>
    @endforeach
</table>
--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>

{{--<script type="text/javascript">

    $(document).ready(function () {
        $('.hostel').change(function(){
            console.log("changed");
            var id = $(this).val();

            if(id){
                console.log(id);
                $jQuery.ajax({
                    type:"GET",
                    url:"{{url('findRoom')}}?id="+id,
                    success:function(res){
                        console.log(id);
                        if(res){
                            $("#room").empty();
                            $("#room").append('<option>Select</option>');
                            $.each(res,function(key,value){
                                $("#room").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#state").empty();
                        }
                    }
                });
            }else{
                $("#hostel").empty();
                $("#room").empty();
            }
        });
    });
    /*===========================================================================*/

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
</script>--}}
