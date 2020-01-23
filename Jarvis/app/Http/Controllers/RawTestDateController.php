<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\TestDateManager;
use App\Entity\RawTestDate;
use App\Entity\importFile;
use Illuminate\Http\Request;

class RawTestDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawTestDates = RawTestDate::take(1)->get();
        $importFiles = ImportFile::get('id');
        //dd($importFiles);
        return view('rawTestDateFolder/rawTestDate')->with(compact('rawTestDates', 'importFiles'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rawTestDateFolder/rawTestDateNew');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rawTestDate = new RawTestDate([
            'importFileId' => $request->input('importFileId'),
            'sheet' => $request->input('sheet'),
            'country' => $request->input('country'),
            'center' => $request->input('center'),
            'centerNumber' => $request->input('centerNumber'),
            'venue' => $request->input('venue'),
            'town' => $request->input('town'),
            'testDate' => $request->input('testDate'),
            'testname' => $request->input('testname'),
            'testFee' => $request->input('testFee'),
            'testCurrency' => $request->input('testCurrency'),

        ]);

        $rawTestDate->save();
        return redirect('rawTestDateFolder/rawTestDate')->with('success', 'rawTestDate Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\RawTestDate  $rawTestDate
     * @return \Illuminate\Http\Response
     */
    public function show(RawTestDate $rawTestDate)
    {
        return view('rawTestDateFolder/rawTestDateShow')->with('rawTestDate', $rawTestDate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\RawTestDate  $rawTestDate
     * @return \Illuminate\Http\Response
     */
    public function edit(RawTestDate $rawTestDate)
    {
        
        //dd(TestDateManager::shout("hello world"));

        // $something = [1,2,3];
        // $testDateManager = new TestDateManager();
        // $testDateManager->storeSomething($something);
        //dd($testDateManager->getSomething());

        return view('rawTestDateFolder/rawTestDateEdit')->with('rawTestDate', $rawTestDate);//->with('testDateManager',$testDateManager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\RawTestDate  $rawTestDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawTestDate $rawTestDate)
    {
        $rawTestDate->importFileId = $request->input('importFileId');
        $rawTestDate->sheet = $request->input('sheet');
        $rawTestDate->country = $request->input('country');
        $rawTestDate->center = $request->input('center');
        $rawTestDate->centerNumber = $request->input('centerNumber');
        $rawTestDate->venue = $request->input('venue');
        $rawTestDate->town = $request->input('town');
        $rawTestDate->testDate = $request->input('testDate');
        $rawTestDate->testname = $request->input('testname');
        $rawTestDate->testFee = $request->input('testFee');
        $rawTestDate->testCurrency = $request->input('testCurrency');

        $rawTestDate->save();
        return redirect('rawTestDateFolder/rawTestDate')->with('success', 'rawTestDate updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\RawTestDate  $rawTestDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawTestDate $rawTestDate)
    {
        $rawTestDate->delete();

        return redirect('rawTestDateFolder/rawTestDate')->with('success', 'rawTestDate Deleted');

    }

    /* 
     * Deletes all rows from the Country table 
     */
    public function deleteRawTestDates(){
        \App\Entity\RawTestDate::query()->delete();

        return redirect('rawTestDateFolder/rawTestDate')->with('success', 'Raw test dates deleted');

    }
}
