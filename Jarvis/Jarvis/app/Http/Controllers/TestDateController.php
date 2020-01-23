<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\TestDateManager;
use App\Entity\EditTestDate;
use App\Entity\RawTestDate;
use App\Entity\ImportFile;

class TestDateController extends Controller {

    // Takes the raw test dates from the selected import file and creates edit test dates 
    // with empty entityId/ieltsId and baseTestCenterId
    public function makeEditTestDates(Request $request){
        $importFileId = $request->input('importFileId');
        //dd($q);
        $rawDates = RawTestDate::where('importFileId', $importFileId)->get();
        //dd($rawDates);
        TestDateManager::makeEditTestDates($rawDates);

        return redirect('/editTestDateFolder/editTestDate')->withSuccess('Test dates converted to be editable');

    }

    public function linkOnCenterNrAndCity(){
        TestDateManager::linkOnCenterNrAndCity();

        return back()->withSuccess('Dates were linked!');
    }

    public function linkDateAndUpdateCenter(Request $request){

        TestDateManager::linkDateAndUpdateCenter($request);

        return back()->withSuccess('Date linked and test center updated!');
    
    }
}