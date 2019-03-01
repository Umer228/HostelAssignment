<?php

namespace App\Http\Controllers\api;

use App\Hostel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return Hostel::all('name','address');
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
            $hostel = new Hostel();

            $hostel->name = $request->name;
            $hostel->phone = $request->phone;
            $hostel->address = $request->address;
            $hostel->save();
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
            $hostel = Hostel::find($id);
            return ($hostel);
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
            $hostel = Hostel::where('id',$id)->first();

            $hostel->name = $request->name;
            $hostel->phone = $request->phone;
            $hostel->address = $request->address;
            $hostel->update();

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
            Hostel::destroy($id);
        }catch(Exception $exception){
            return "Bad request "+$exception;
        }

    }
}
