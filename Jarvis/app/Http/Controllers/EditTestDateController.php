<?php

namespace App\Http\Controllers;

use App\Entity\EditTestDate;
use App\Entity\RawTestDate;
use Illuminate\Http\Request;
use App\Helpers\TestDateManager;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class EditTestDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$linkedDates = EditTestDate::where('baseTestCenterId', '!=', 0)->paginate(10);
        //$unlinkedDates = EditTestDate::where('baseTestCenterId','=', 0)->paginate(10);

        return view('editTestDateFolder/editTestDate');//->with(compact('linkedDates', 'unlinkedDates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editTestDateFolder/editTestDateNew');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $editTestDate = new EditTestdate([
            'regularTestDate' => $request->input('regularTestDate'),
            'testTypeId' => $request->input('testTypeId'),
            'testDate' => $request->input('testDate'),
            'testFee' => $request->input('testFee'),
            'feeCurrency' => $request->input('feeCurrency'),
            'baseTestCenterId' => $request->input('baseTestCenterId'),
            'rawTestDateId' => $request->input('rawTestDateId'),
        ]);

        $editTestDate->save();
        return redirect('editTestDateFolder/editTestDate')->with(compact('linkedDates', 'unlinkedDates'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\EditTestDate  $editTestDate
     * @return \Illuminate\Http\Response
     */
    public function show(EditTestDate $editTestDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\EditTestDate  $editTestDate
     * @return \Illuminate\Http\Response
     */
    public function edit(EditTestDate $editTestDate)
    {
        //$editTestDate = EditTestDate::with('baseTestCenter')->where('id', '=', $editTestDate->id)->first();

        //dd($editTestDate->baseTestCenter->id);
        if ($editTestDate->baseTestCenterId == "" || $editTestDate->baseTestCenterId == null)
            return view('editTestDateFolder/unlinkedTestDateEdit')->with(compact('editTestDate'));
        else 
            return view('editTestDateFolder/linkedTestDateEdit')->with(compact('editTestDate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\EditTestDate  $editTestDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EditTestDate $editTestDate)
    {
        dd($request);
        $newBaseTestCenterId = $request->input('baseTestCenterId');
        
        if($newBaseTestCenterId == null){
            $newBaseTestCenterId = 0;
        }
        //$editTestDate->regularTestDate = $request->input('regularTestDate');
        //$editTestDate->testTypeId = $request->input('testTypeId');
        $editTestDate->testDate = $request->input('testDate');
        $editTestDate->testFee = $request->input('testFee');
        $editTestDate->feeCurrency = $request->input('feeCurrency');
        $editTestDate->baseTestCenterId = $newBaseTestCenterId;
        //$editTestDate->rawTestDateId = $request->input('rawTestDateId');

        $editTestDate->save();

        return redirect('editTestDateFolder/editTestDate')->with('success', 'Edit test date Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\EditTestDate  $editTestDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(EditTestDate $editTestDate)
    {
        $editTestDate->delete();

        return redirect('editTestDateFolder/editTestDate')->with('success', 'Edit test date Deleted');
    }

    /* 
     * Deletes all rows from the edit_test_dates table 
     */
    public function deleteEditTestDates(){
        \App\Entity\EditTestDate::query()->delete();

        return redirect('editTestDateFolder/editTestDate')->with('success', 'Edit test dates deleted');

    }
    
    
}
