<?php

namespace App\Http\Controllers;

use App\Entity\City;
use App\Entity\Country;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Input;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cities = city::get();
        return view('cityFolder.city');//->with(compact("cities"));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cityFolder/cityNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countryId = $request->input('countryId');
        $cityName = $request->input('cityName');
        $stateId = $request->input('stateId') ?? '0';
        $alternativeName = $request->input('alternativeName') ?? $cityName;
        
        $countryExists = Country::where('id', $countryId)->first();
        $stateExists = false;
        if ($stateId != 0) {
            $stateExists = State::where('id', $stateId)->first();
        }

        if ($countryExists && ($stateId == 0 || $stateExists)){            
            $city = new City([
                'id' => $request->input('id'),
                'countryId' => $countryId,
                'stateId' => $stateId,
                'name' => $cityName,
                'alternativeName' => $alternativeName,
                'lng' => $request->input('lng'),
                'lat' => $request->input('lat'),
                'description' => $request->input('description'),
                'inhabitants' => $request->input('inhabitants'),
            ]);

            $city->save();
            return redirect('cityFolder/city')->with('success', 'Successfuly added city');
            
        }
        else{
            return redirect('cityFolder/city/create')->with('error', 'Country doesn\'t exist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('cityFolder/cityShow')->with('city', $city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('cityFolder/cityEdit')->with('city', $city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $editCountryId = $request->input('countryId');
        $editStateId = $request->input('stateId') ?? 0 ;

        $countryExists = Country::where('id', $editCountryId)->first();
        $stateExists = false;
        if ($editStateId != 0) {
            $stateExists = State::where('id', $editStateId)->first();
        }

        if ($countryExists && ($editStateId == 0 || $stateExists)){
            $city->id = $request->input('id');
            $city->countryId = $editCountryId;
            $city->stateId = $editStateId;
            $city->name = $request->input('cityName');
            $city->alternativeName = $request->input('alternativeName');
            $city->lng = $request->input('lng');
            $city->lat = $request->input('lat');
            $city->description = $request->input('description');
            $city->inhabitants = $request->input('inhabitants');

            $city->save();

            return redirect('cityFolder/city')->with('success', 'City Updated');
        }
        else {
            return redirect('cityFolder/city/edit')->with('error', 'Country doesn\'t exist');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect('cityFolder/city')->with('success', 'City Deleted');
    }
}
