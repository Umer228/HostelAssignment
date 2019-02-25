<?php

namespace App\Http\Controllers;

use App\Hostel;
use App\People;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('hostelview.people.create')->
        with('peopledata',People::all())->
        with('hosteldata',Hostel::all())->
        with('roomdata',Room::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //

        $hostel_id = $request->hostel_id;
        $room_id = $request->room_id;
        $name = $request->name;
        $cnic = $request->cnic;
        $address = $request->address;

        People::create([
            'hostel_id'=>$hostel_id,
            'room_id'=>$room_id,
            'name'=>$name,
            'cnic'=>$cnic,
            'address'=>$address
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        //
    }
    public function findRoom(Request $request){
        $data = Room::select('id','hostel_id','capacity','status','fan','ac','furnished')->where
        ('hostel_id',$request->id)->take(50);
        /*return response()->json($data);*/

/*        return $data;*/
        return Response::json($data);
    }

}
