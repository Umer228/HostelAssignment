<?php

namespace App\Http\Controllers\api;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return Room::all();
        }catch(Exception $exception){
            return "Bad request "+$exception;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $room = new Room();
            $room->hostel_id = $request->hostel_id;
            $room->capacity = $request->capacity;
            $room->status = $request->status;
            $room->fan = $request->fan;
            $room->ac = $request->ac;
            $room->furnished = $request->furnished;
            $room->save();
            return "success";

        }catch(Exception $exception){
            return "Bad request "+$exception;
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $room = Room::find($id);
            return ($room);
        }catch(Exception $exception){
            return "Bad request "+$exception;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $room = Room::where('id',$id)->first();

            $room->hostel_id = $request->hostel_id;
            $room->capacity = $request->capacity;
            $room->status = $request->status;
            $room->fan = $request->fan;
            $room->ac = $request->ac;
            $room->furnished = $request->furnished;
            $room->save();
            $room->update();

            return "success";
        }catch(Exception $exception){
            return "Bad request "+$exception;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Room::destroy($id);
        }catch(Exception $exception){
            return "Bad request "+$exception;
        }

    }
}
