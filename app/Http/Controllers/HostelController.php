<?php

namespace App\Http\Controllers;

use App\Hostel;
use Illuminate\Http\Request;
use function Sodium\add;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $host = Hostel::all();
        return view('hostelview.hostel.create')->with('hosteldata', $host);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//      dd($request->all());
        $name = $request->name;
        $ph = $request->phone;
        $addr = $request->address;

        Hostel::create(['name'=>$name, 'phone'=>$ph, 'address'=>$addr]);

        /*$hostel = new Hostel();
        $hostel->name = $request['name'];
        $hostel->phone = $request['phone'];
        $hostel->address = $request['address'];*/
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(Hostel $hostel)
    {
        //
        $host = Hostel::all();
        return view('hostelview.hostel.show')->with('hosteldata', $host);
    }

    public function showSpecific(Hostel $hostel, $id)
    {
        //
        $host = Hostel::find($id);
        return view('hostelview.hostel.show')->with('hosteldata', $host);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hostel $hostel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hostel $hostel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        //
    }
}
