<?php

namespace App\Http\Controllers\api;

use App\People;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return People::all('name','address');
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
            $people = new People();

            $people->hostel_id = $request->hostel_id;
            $people->room_id = $request->room_id;
            $people->name = $request->name;
            $people->cnic = $request->phone;
            $people->address = $request->address;
            $people->save();
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
            $people = People::find($id);
            return ($people);
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
            $people = People::where('id',$id)->first();

            $people->hostel_id = $request->hostel_id;
            $people->room_id = $request->room_id;
            $people->name = $request->name;
            $people->cnic = $request->phone;
            $people->address = $request->address;
            $people->update();

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
            People::destroy($id);
        }catch(Exception $exception){
            return "Bad request "+$exception;
        }
    }
}
