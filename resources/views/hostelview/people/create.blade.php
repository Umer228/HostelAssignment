@extends('layouts.hostelApp')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>People Registration</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
{{-------------------------------------------------------------------------------------------}}
    {{--Java Script--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $(document).ready(function () {
            $(document).on('change','.hostelname',function () {
               console.log("it changes");
               var hostel_id = $(this).val();
               // console.log(hostel_id);

               //var div = $(this).parent();
               var op=" ";

               $.ajax({
                   type: 'get',
                   url:'{!! \Illuminate\Support\Facades\URL::to('findroom') !!}',
                   data:{'id':hostel_id},

                   success:function (data) {
                       console.log('success');
                       var len = Object.keys(data).length;
                       console.log("size: "+ len);
                       console.log(data);

                       op += '<option value="" selected disabled>Select Capacity</option>';
                       for (let i=0;i<=Object.keys(data).length;i++){
                           op += '<option value="'+data[i].id+'">'+i+" "+data[i].capacity+'</option>';
                       }
                       $(document).find('.roomcapacity').html(" ");
                       $(document).find('.roomcapacity').append(op);

                   },
                   error:function () {

                   }
               });
            });
            $(document).on('change','.roomcapacity',function () {

                console.log("Capacity Changes.");
                var room_id = $(this).val();
                console.log("Room Id: "+room_id);
                var op=" ";
                $.ajax({
                    type: 'get',
                    url:'{!! \Illuminate\Support\Facades\URL::to('findroom') !!}',
                    data:{'id':room_id},
                    success:function (data) {

                        if ( data.error)  alert(data.error);
                        alert(data);
                        console.log("ac status: "+data[room_id].ac);

                        var status = data[room_id].status;
                        var fan = data[room_id].fan;
                        var ac = data[room_id].ac;
                        var furnished = data[room_id].furnished;

                        console.log("fan : "+fan+status+ac+furnished);
                        if (status==0){
                            $(document).find('#status').html(" ");
                            $(document).find('#status').prop('checked',true);
                        }
                        if (status==1){
                            $(document).find('#statusno').html(" ");
                            $(document).find('#statusno').prop('checked',false);
                        }
                        if (fan==0){
                            $(document).find('#fan').html(" ");
                            $(document).find('#fan').prop('checked',true);
                        }
                        if (fan==1){
                            $(document).find('#fanno').html(" ");
                            $(document).find('#fanno').prop('checked',false);
                        }
                        if (ac==0){
                            $(document).find('#ac').html(" ");
                            $(document).find('#ac').prop('checked',true);
                        }
                        if (ac==1){
                            $(document).find('#acno').html(" ");
                            $(document).find('#acno').prop('checked',false);
                        }
                        if (furnished==0){
                            $(document).find('#furnished').html(" ");
                            $(document).find('#furnished').prop('checked',true);
                        }
                        if (furnished==1){
                            $(document).find('#furnishedno').html(" ");
                            $(document).find('#furnishedno').prop('checked',false);
                        }
                    }
                });
            });
        });

        function availbility() {
            var hostelId = document.getElementById('hostel').value;
            var roomCapacity= document.getElementById('capacity').value;
            var ac = document.getElementById('ac').value;
            var fan = document.getElementById('fan').value;
            var furnished= document.getElementById("furnished").value;

            alert("h_id: "+hostelId+" | Capacity: "+
                roomCapacity+" | AC: "+ac+" | Fan: "+fan+" | Furnished: "+furnished);

            @forEach($roomdata as $room)
            {{$room->id}};
            @endforeach
        }
    </script>
{{------------------------------------------------------------------------------------------}}
    <!-- Styles -->

</head>
<body>
<div class="flex-center position-ref full-height">
    <form action={{route('createpeople.store')}} method="post">
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
            <tr>
                <td><input type="button" id="checkbtn" value="submit" onclick="availbility()"></td>
            </tr>
        </table>
    </form>
</div>
{{--retriving data from database--}}
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
</body>
</html>

@endsection
