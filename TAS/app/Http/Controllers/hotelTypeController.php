<?php

namespace App\Http\Controllers;

use App\HotelType;
use Illuminate\Http\Request;

class hotelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        
    }

    public function listIndex()
    {   
        $hotel_type = HotelType::all();

        return $hotel_type;     
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelType  $hotelType
     * @return \Illuminate\Http\Response
     */
    public function show(HotelType $hotelType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelType  $hotelType
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelType $hotelType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelType  $hotelType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelType $hotelType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelType  $hotelType
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelType $hotelType)
    {
        //
    }
}
