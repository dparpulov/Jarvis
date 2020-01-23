<?php

namespace App\Http\Controllers;

use App\Entity\BaseTestCenter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BaseTestCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseTCs = BaseTestCenter::paginate(10);

        return view('baseTCFolder/baseTC')->with(compact('baseTCs'));//->with($APP_URL);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baseTCFolder/baseTCNew');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $referer = $_SERVER['HTTP_REFERER'];
        $url = config('variables.url');
        
        $editTestDateUrl = $url.'/editTestDateFolder/editTestDate';

        $fromEditTestDate = false;

        if (strpos($referer, $editTestDateUrl) !== false) {
            $fromEditTestDate = true;
        }
        

        $baseTC = new BaseTestCenter([
            'testCenterAssociation' => $request->input('testCenterAssociation'),
            'centerNumber' => $request->input('centerNumber'),
            'venue' => $request->input('venue'),
            'cityId' => $request->input('cityId'),
            'testProviderId' => $request->input('testProviderId'),
            'ieltsId' => $request->input('ieltsId'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'clickoutURLId' => $request->input('clickoutURLId'),
        ]);

        $baseTC->save();

        if ($fromEditTestDate === true) {
            return redirect()->back();
        }

        return redirect('baseTCFolder/baseTC')->with('success', 'Successfuly added Base test center');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\BaseTestCenter  $baseTestCenter
     * @return \Illuminate\Http\Response
     */
    public function show(BaseTestCenter $baseTC)
    {
        return view('baseTCFolder/baseTCShow')->with('baseTC', $baseTC);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\BaseTestCenter  $baseTestCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(BaseTestCenter $baseTC)
    {
        //$cities = \App\Entity\City::all('id', 'name', 'countryId');
        $testProviders = \App\Entity\TestProvider::all('name', 'id');
        //$clickoutURLs = \App\Entity\ClickoutURL::all('trackingLinkName', 'id');
        

        return view('baseTCFolder/baseTCEdit')->with(compact('baseTC', 'testProviders'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\BaseTestCenter  $baseTestCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseTestCenter $baseTC)
    {
        $baseTC->testCenterAssociation = $request->input('testCenterAssociation');
        $baseTC->centerNumber = $request->input('centerNumber');
        $baseTC->venue = $request->input('venue');
        $baseTC->cityId = $request->input('cityId');
        $baseTC->testProviderId = $request->input('testProviderId');
        $baseTC->ieltsId = $request->input('ieltsId');
        $baseTC->name = $request->input('name');
        $baseTC->description = $request->input('description');
        $baseTC->clickoutURLId = $request->input('clickoutURLId');

        $baseTC->save();

        return redirect('baseTCFolder/baseTC')->with('success', 'Base Test Center Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\BaseTestCenter  $baseTestCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseTestCenter $baseTC)
    {
        $baseTC->delete();

        return redirect('baseTCFolder/baseTC')->with('success', 'Base Test Center Deleted');
    }

    

    /* 
     * Deletes all rows from the Country table 
     */
    public function deleteBaseTestCenter(){
        \App\Entity\BaseTestCenter::query()->delete();

        return redirect('baseTCFolder/baseTC')->with('success', 'Base test centers deleted');

    }

    
}
