<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    //Array 'data' of objects 'city' (used for generating the dataTables)
    public function cityJsonDataArray()
    {
        $cities['data'] = \App\Entity\City::join('country', 'country.id', '=', 'city.countryId')
                            ->get(['city.id', 'countryId','country.Name AS country','stateId','city.name', 'alternativeName', 'inhabitants']);
        
        return response()->json($cities);
    }

    //'city' objects (used for generating dataList options)
    public function cityJsonDataList()
    {
        $cities = \App\Entity\City::join('country', 'country.id', '=', 'city.countryId')
                            ->get(['city.id', 'countryId','country.Name AS country','stateId','city.name', 'alternativeName', 'inhabitants']);
        
        return response()->json($cities);
    }

    public function clickoutURLJsonDataArray()
    {
        $urls['data'] = \App\Entity\ClickoutURL::all('id', 'trackingLinkName', 'shortTrackingLink', 'landingPage', 'clickmeterCreationDate');
        
        return response()->json($urls);
    }

    public function clickoutURLJsonDataList()
    {
        $urls = \App\Entity\ClickoutURL::all('id', 'trackingLinkName', 'shortTrackingLink', 'landingPage', 'clickmeterCreationDate');
        
        return response()->json($urls);
    }

    public function baseTCJsonDataArray()
    {
        // $baseTestCenter['data'] = \App\Entity\BaseTestCenter::select('base_test_center.id', 'testCenterAssociation', 'centerNumber', 'venue','city.Name AS city', 'base_test_center.name', 'clickoutURLId', 'ieltsId', 'testProviderId', 'test_provider.name as testProvider', DB::raw('COUNT(edit_test_date.id) as edittestdateCount'))
        //                 ->join('test_provider','testProviderId', '=', 'test_provider.id')
        //                 ->join('city', 'cityId', '=', 'city.id')
        //                 ->join('edit_test_date', 'base_test_center.id', '=', 'baseTestCenterId')
        //                 ->limit(10)
        //                 ->groupBy('edit_test_date.baseTestCenterId')
        //                 ->get()
        //                 ;

        $baseTestCenter['data'] = \App\Entity\BaseTestCenter::join('city', 'cityId', '=', 'city.id')
                                ->get(['base_test_center.id', 'testCenterAssociation', 'centerNumber', 'venue','city.Name AS city', 'base_test_center.name', 'clickoutURLId', 'ieltsId', 'testProviderId']);


        // $datesToCentersCount = \App\Entity\BaseTestCenter::join('edit_test_date', 'edit_test_date.baseTestCenterId', '=', 'base_test_center.id')
        //                 ->select('edit_test_date.baseTestCenterId as baseTCId' ,DB::raw("count(edit_test_date.baseTestCenterId) as linkedDates"))
        //                 ->groupBy('edit_test_date.baseTestCenterId')
        //                 ->get();
        
        // dd($datesToCentersCount[0]->linkedDates);

        return response()->json($baseTestCenter);
    }

    public function baseTCJsonDataList()
    {
        $baseTestCenter = \App\Entity\BaseTestCenter::where('testProviderId', '=', 1)
                        ->join('city', 'cityId', '=', 'city.id')
                        ->get(['base_test_center.id','centerNumber', 'venue','city.Name AS city', 'base_test_center.name', 'clickoutURLId', 'testProviderId']);
        
        return response()->json($baseTestCenter);
    }

    public function stateJsonDataArray()
    {
        $states['data'] = \App\Entity\State::join('country', 'country.id', '=', 'state.countryId')
                            ->get(['state.id', 'countryId','country.Name AS country','state.name', 'stateCode']);
        
        return response()->json($states);
    }

    public function stateJsonDataList()
    {
        $states = \App\Entity\State::all();
        
        return response()->json($states);
    }

    public function rawTestDatesJsonArray($id)
    {
        $rawTestDates['data'] = \App\Entity\RawTestDate::where('importFileId', '=', $id)                   
                                ->get(['id', 'importFileId', 'sheet', 'country', 'center', 'centerNumber', 'venue', 'town', 'testDate', 'testName', 'testFee', 'feeCurrency']);
        
        return response()->json($rawTestDates);
    }

    public function linkedEditTestDatesJsonArray()
    {
        $linkedTestDates['data'] = \App\Entity\EditTestDate::where('baseTestCenterId', '!=', 0)
                                ->join('raw_test_date', 'rawTestDateId', '=', 'raw_test_date.id')
                                ->join('base_test_center', 'baseTestCenterId', '=', 'base_test_center.id')          
                                ->get(['edit_test_date.id','regularTestDate','testTypeId','edit_test_date.testDate','edit_test_date.testFee', 'edit_test_date.feeCurrency','town', 'raw_test_date.venue as rtdVenue', 'base_test_center.venue as btcVenue','rawTestDateId',]);

        return response()->json($linkedTestDates);
    }

    public function unlinkedEditTestDatesJsonArray()
    {
        $unlinkedTestDates['data'] = \App\Entity\EditTestDate::where('baseTestCenterId', '=', 0)
                                ->join('raw_test_date', 'rawTestDateId', '=', 'raw_test_date.id')
                                ->get(['edit_test_date.id','regularTestDate','testTypeId','edit_test_date.testDate','edit_test_date.testFee', 'edit_test_date.feeCurrency','town','venue','rawTestDateId',]);
        
        return response()->json($unlinkedTestDates);
    }
}