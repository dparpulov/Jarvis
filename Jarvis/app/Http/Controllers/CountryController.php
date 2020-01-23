<?php

namespace App\Http\Controllers;

use App\Entity\Country;
//use App\Imports\CountryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $countries = Country::paginate(10);
        $countries = Country::all();
        
        return view('countryFolder/country')->with('countries', $countries);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countryFolder/countryNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new Country([
            'id' => $request->input('id'),
            'spId' => $request->input('spId'),
            'name' => $request->input('countryName'),
            'continent' => $request->input('continent'),
            'currencyCode' => $request->input('currencyCode'),
            'currencyName' => $request->input('currencyName'),
            'geonameId' => $request->input('geonameId'),

        ]);

        $country->save();
        return redirect('countryFolder/country')->with('success', 'Successful added country');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {

        return view('countryFolder/countryShow')->with('country', $country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countryFolder/countryEdit')->with('country', $country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country->id = $request->input('id');
        $country->spId = $request->input('spId');
        $country->name = $request->input('countryName');
        $country->continent = $request->input('continent');
        $country->currencyCode = $request->input('currencyCode');
        $country->currencyName = $request->input('currencyName');
        $country->geonameId = $request->input('geonameId');
    
        $country->save();

        return redirect('countryFolder/country')->with('success', 'Country Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect('countryFolder/country')->with('success', 'Country Deleted');
    }

    

    /* 
     * Deletes all rows from the Country table 
     */
    public function deleteAllCSC(){
        \App\Entity\Country::query()->delete();
        \App\Entity\State::query()->delete();
        \App\Entity\City::query()->delete();

        return redirect('countryFolder/country')->with('success', 'Countries, states and cities deleted');

    }


}
