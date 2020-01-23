<?php // Code within app\Helpers\TestDateManager.php

namespace App\Helpers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Entity\EditTestDate;
use App\Entity\BaseTestCenter;
use App\Entity\RawTestDate;
use DB;

class TestDateManager
{

    // Gets all the rawTestDates and makes an editTestDate row in the db
    // with empty entityId and baseTestCenterId
    public static function makeEditTestDates($rawTestDates){
        set_time_limit(300);

        \App\Entity\EditTestDate::query()->delete();

        foreach ($rawTestDates as $testDate) {
            $editTestDate = new EditTestDate ([
                'regularTestDate' => '3',
                'testTypeId' => self::getTestTypeId($testDate->testName),
                'testDate' => self::getCarbonDate($testDate->testDate),
                'testFee' => $testDate->testFee,
                'feeCurrency' => $testDate->feeCurrency,
                'baseTestCenterId' => "0",
                'rawTestDateId' => $testDate->id,
            ]);
            //dump($editTestDate);
            $editTestDate->save();
        }
    }

    // Returns the passed date as a Carbon object
    public static function getCarbonDate($date){
        return Carbon::parse($date);
    }

    // Returns an Id that represents the test name
    public static function getTestTypeId($testName){
        switch ($testName) {
            case 'Academic':
                $testType = 1;
                break;
            case 'General Training':
                $testType = 2;
                break;
            case 'UKVI General Training':
                $testType = 3;
                break;
            case 'UKVI Academic':
                $testType = 4;
                break;
            case 'IELTS SELT':
                $testType = 4;
                break;
            case 'CB IELTS SELT':
                $testType = 4;
                break;
            case 'UKVI Life Skills A1':
                $testType = 5;
                break;
            case 'LS A1':
                $testType = 5;
                break;
            case 'LS A2':
                $testType = 5;
                break;
            case 'UKVI Life Skills B1':
                $testType = 6;
                break;
            case 'LS B1':
                $testType = 6;
                break;
            default:
                $testType = 0;
                break;
        }
        
        return $testType;
    }


    //NEEDS TO BE FINISHED 
    // public static function linkOnCenterCNumberVenueTown(){
    //     set_time_limit(500);

    //     $editTestDates_linkedOnCCNumberVenueTown = EditTestDate::join('raw_test_date', 'edit_test_date.rawTestDateId', '=', 'raw_test_date.id')
    //     ->join('raw_test_date', 'edit_test_date.rawTestDateId', '=', 'raw_test_date.id')
    //     ->join('base_test_center', 'raw_test_date.center', '=', 'base_test_center.name')
    //     ->select('edit_test_date.*', 'base_test_center.ieltsId', 'base_test_center.id' )
    //     ->where('raw_test_date.centerNumber', '=', 'base_test_center.centerNumber')
    //     ->where('raw_test_date.venue', '=', 'base_test_center.venue')
    //     ->where('raw_test_date.town', '=', 'base_test_center.city.name')
    //     ->get();

    //     dd($editTestDates_linkedOnCCNumberVenueTown);


    //     foreach ($editTestDates_linkedOnCNumberVenueTown as $editTestDates_linkedOnCNumberVenueTown) {
    //         $updated  = EditTestDate::find($editTestDates_linkedOnCNumberVenueTown->Id);
    //         $updated->update(['baseTestCenterId' => $editTestDates_linkedOnCNumberVenueTown->id]);

    //         $updated->save();
    //     }
    // }

    //Gets all editTestDates and links them based on centerNumber and cityName
    public static function linkOnCenterNrAndCity(){
        set_time_limit(500);

        $ukviEditTestDates_linkedOnCenterNrAndCity = EditTestDate::join('raw_test_date', 'edit_test_date.rawTestDateId', '=', 'raw_test_date.id')
        ->join('base_test_center', DB::RAW("CONCAT(raw_test_date.centerNumber, raw_test_date.town, 'UKVI')"), '=', 'base_test_center.testCenterAssociation')
        ->select('edit_test_date.*','edit_test_date.Id', 'base_test_center.ieltsId', 'edit_test_date.baseTestCenterId', 'base_test_center.id' )
        ->where('base_test_center.testProviderId', '=', 1)
        ->where('edit_test_date.baseTestCenterId', '=', 0)
        ->where('raw_test_date.sheet', '=', 'UKVI')
        ->get();

        //Shows how many UKVI dates have been linked        
        //dump(count($ukviEditTestDates_linkedOnCenterNrAndCity));

        foreach ($ukviEditTestDates_linkedOnCenterNrAndCity as $ukviEditTestDate_linkedOnCenterNrAndCity) {
            $updated  = EditTestDate::find($ukviEditTestDate_linkedOnCenterNrAndCity->Id);
            $updated->update(['baseTestCenterId' => $ukviEditTestDate_linkedOnCenterNrAndCity->id]);

            $updated->save();
        }

        $orsEditTestDates_linkedOnCenterNrAndCity = EditTestDate::join('raw_test_date', 'edit_test_date.rawTestDateId', '=', 'raw_test_date.id')
        ->join('base_test_center', DB::RAW("CONCAT(raw_test_date.centerNumber, raw_test_date.town)"), '=', 'base_test_center.testCenterAssociation')
        ->select('edit_test_date.*','edit_test_date.Id', 'base_test_center.ieltsId', 'edit_test_date.baseTestCenterId', 'base_test_center.id' )
        ->where('base_test_center.testProviderId', '=', 1)
        ->where('edit_test_date.baseTestCenterId', '=', 0)
        ->where('raw_test_date.sheet', '=', 'ORS')
        ->get();
     
        //Shows how many ORS dates have been linked
        //dump(count($orsEditTestDates_linkedOnCenterNrAndCity));

        foreach ($orsEditTestDates_linkedOnCenterNrAndCity as $orsEditTestDate_linkedOnCenterNrAndCity) {
            $updated  = EditTestDate::find($orsEditTestDate_linkedOnCenterNrAndCity->Id);
            $updated->update(['baseTestCenterId' => $orsEditTestDate_linkedOnCenterNrAndCity->id]);

            $updated->save();
        }
        
    }


    public static function linkDateAndUpdateCenter(Request $request)
    {
        // dd($request->sheet);
        

        $editTestDate = EditTestDate::where('id', '=', $request->id)->first();
        
        $newBaseTestCenterId = $request->input('baseTestCenterId');

        //$editTestDate->regularTestDate = $request->input('regularTestDate');
        //$editTestDate->testTypeId = $request->input('testTypeId');
        $editTestDate->testDate = $request->input('testDate');
        $editTestDate->testFee = $request->input('testFee');
        $editTestDate->feeCurrency = $request->input('feeCurrency');
        $editTestDate->baseTestCenterId = $newBaseTestCenterId;
        //$editTestDate->rawTestDateId = $request->input('rawTestDateId');

        $editTestDate->save();

        
        if($newBaseTestCenterId == null){
            $newBaseTestCenterId = 0;
        }else{
            $baseTC = BaseTestCenter::where('id', '=', $newBaseTestCenterId)->first();

            if($request->sheet == "ORS"){
                $baseTC->testCenterAssociation = $request->input('centerNumber') . $request->input('town');
            }else{
                $baseTC->testCenterAssociation = $request->input('centerNumber') . $request->input('town') . "UKVI";
            }

            $baseTC->centerNumber = $request->input('centerNumber');
            $baseTC->venue = $request->input('venue');
    
        }
        $baseTC->save();            


    }
}