<?php

namespace App\Http\Controllers;

use App\Hostel;
use App\Http\Requests\StoreRoomRequest;
use App\People;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::orderBy('id')->paginate(10);
        return view('hostelview.room.show')->with('room', $room);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $host = Hostel::all();
        return view('hostelview.room.create')->with('hosteldata', $host);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        //
//        dd($request->all());


        $hostel_id = $request->hostel_id;
        $capacity = $request->capacity;
        $status = $request->status;
        $fan = $request->fan;
        $ac = $request->ac;
        $furnished = $request->furnished;

        Room::create(['hostel_id'=>$hostel_id, 'capacity'=>$capacity, 'status'=>$status,
                        'fan'=>$fan, 'ac'=>$ac, 'furnished'=>$furnished]);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $host = Hostel::all();
        return view('hostelview.room.edit')->with('room', $room)->with('hosteldata', $host);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update($request->all());
        return redirect(route('rooms.index'))->with('status', 'updated successfully')->withInput($request->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Room::destroy($room->id);
        return redirect()->route('rooms.index')->with('status', 'successfully deleted');
    }
}
