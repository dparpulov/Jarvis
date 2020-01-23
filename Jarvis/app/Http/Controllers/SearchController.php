<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    
    public function searchCountry(Request $request)
    {
        $q = $request->input('q');

        $countries = \App\Entity\Country::where( 'name', 'LIKE', '%' . $q . '%' )
                    ->orWhere('spId', 'LIKE', '%' . $q . '%')
                    ->orWhere('continent', 'LIKE', '%' . $q . '%')
                    ->orWhere('geonameId', 'LIKE', '%' . $q . '%')
                    ->orWhere('currencyCode', 'LIKE', '%' . $q . '%')
                    ->orWhere('id', 'LIKE', '%' . $q . '%')
                    ->paginate(10);

        if (count($countries) > 0)
            return view('countryFolder/country')->with('countries', $countries)->withQuery($q);
        else
            return view('countryFolder/country')->withMessage('No Details found. Try to search again !')
            ->with('countries', $countries);
    }

    
    public function searchState(Request $request)
    {
        $q = $request->input('q');


        // $states = \App\Entity\State::join('country', 'country.stateId', '=', 'state.id')
        //             ->where( 'name', 'LIKE', '%' . $q . '%' )
        //             ->orWhere('countryId', 'LIKE', '%' . $q . '%')
        //             ->paginate(10);

        $states = \App\Entity\State::where( 'name', 'LIKE', '%' . $q . '%' )
                    ->orWhere('countryId', 'LIKE', '%' . $q . '%')
                    ->paginate(10);


        if (count($states) > 0)
            return view('stateFolder/state')->with('states', $states)->withQuery($q);
        else
            return view('stateFolder/state')->withMessage('No Details found. Try to search again !')
            ->with('states', $states);
    }


    public function searchCity(Request $request)
    {
        $q = $request->input('q');

        $cities = \App\Entity\City::where( 'name', 'LIKE', '%' . $q . '%' )
                    ->orWhere('alternativeName', 'LIKE', '%' . $q . '%')
                    ->paginate(10);

        if (count($cities) > 0)
            return view('cityFolder/city')->with('cities', $cities)->withQuery($q);
        else
            return view('cityFolder/city')->withMessage('No Details found. Try to search again !')
            ->with('cities', $cities);
    }

    public function searchBaseTC(Request $request)
    {
        $q = $request->input('q');
        
        // $baseTCs = \App\Entity\BaseTestCenter::join('city', 'city.id', '=', 'base_test_center.cityId')
        //             ->where( 'name', 'LIKE', '%' . $q . '%' )
        //             ->orWhere('city.name', 'LIKE', '%' . $q . '%')
        //             ->orWhere('ieltsId', 'LIKE', '%' . $q . '%')
        //             ->orWhere('venue', 'LIKE', '%' . $q . '%')
        //             ->paginate(10);

        $baseTCs = \App\Entity\BaseTestCenter::where( 'name', 'LIKE', '%' . $q . '%' )
                    ->orWhere('cityId', 'LIKE', '%' . $q . '%')
                    ->orWhere('ieltsId', 'LIKE', '%' . $q . '%')
                    ->orWhere('venue', 'LIKE', '%' . $q . '%')
                    ->orWhere('id', 'LIKE', '%' . $q . '%')
                    ->paginate(10);


        if (count($baseTCs) > 0)
            return view('baseTCFolder/baseTC')->with('baseTCs', $baseTCs)->withQuery($q);
        else
            return view('baseTCFolder/baseTC')->withMessage('No Details found. Try to search again !')
            ->with('baseTCs', $baseTCs);
    }

    
    public function searchImportFile(Request $request)
    {
        $q = $request->input('q');
        $importFiles = \App\Entity\importFile::where( 'fileName', 'LIKE', '%' . $q . '%' )
                    ->orWhere('uploadTime', 'LIKE', '%' . $q . '%')
                    ->paginate(10);
        if (count($importFiles) > 0)
            return view('importFileFolder/importFile')->with('importFiles', $importFiles)->withQuery($q);
        else
            return view('importFileFolder/importFile')->withMessage('No Details found. Try to search again !')
            ->with('importFiles', $importFiles);
    }

    
    public function searchRawTestDate(Request $request)
    {
        $q = $request->input('q');
        $rawTestDates = \App\Entity\RawTestDate::where( 'importFileId', 'LIKE', '%' . $q . '%' )
                    ->orWhere('country', 'LIKE', '%' . $q . '%')
                    ->orWhere('centerNumber', 'LIKE', '%' . $q . '%')
                    ->paginate(10);
        if (count($rawTestDates) > 0)
            return view('rawTestDateFolder/rawTestDate')->with('rawTestDates', $rawTestDates)->withQuery($q);
        else
            return view('rawTestDateFolder/rawTestDate')->withMessage('No Details found. Try to search again !')
                        ->with('rawTestDates', $rawTestDates);
    }

    public function searchClickoutURL(Request $request)
    {
        $q = $request->input('q');
        $clickoutURLs = \App\Entity\clickoutURL::where( 'trackingLinkName', 'LIKE', '%' . $q . '%' )
                        ->orWhere('shortTrackingLink', 'LIKE', '%' . $q . '%')
                        ->orWhere('landingPage', 'LIKE', '%' . $q . '%')
                        ->paginate(10);
        if (count($clickoutURLs) > 0)
            return view('urlFolder/url')->with('clickoutURLs', $clickoutURLs)->withQuery($q);
        else
            return view('urlFolder/url')->withMessage('No Details found. Try to search again !')
            ->with('clickoutURLs', $clickoutURLs);
    }
}