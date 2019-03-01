<?php

namespace App\Http\Controllers;

use App\Hostel;
use App\Http\Requests\StoreHostelRequest;
use App\People;
use App\Room;
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
        $host = Hostel::orderBy('id')->paginate(10);
        return view('hostelview.hostel.show')->with('hosteldata', $host);
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
    public function store(StoreHostelRequest $request)
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
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
        return view('hostelview.hostel.search');
    }
    public function find(Hostel $hostel)
    {

        $id = $hostel->id;
        $host = Hostel::find($id);
        return $host;
    }
    public function edit(Hostel $hostel)
    {
        //dd($hostel->all());
        return view('hostelview.hostel.edit')->with('hostel', $hostel);
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
        $hostel->update($request->all());
        return redirect(route('hostels.index'))->with('status', 'updated successfully')->withInput($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hostel $hostel)
    {
        Hostel::destroy($hostel->id);
        return redirect()->route('hostels.index')->with('status', 'successfully deleted');
    }
}
