<?php

namespace App\Http\Controllers;

use App\Entity\TestType;
use App\Entity\Test;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testTypes = TestType::paginate(10);
        return view('testTypeFolder/testType')->with('testTypes', $testTypes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testTypeFolder/testTypeNew');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testId = $request->input('testId');
        $testExists = Test::where('id', $testId)->first();

        if ($testExists) {
            $testType = new TestType([
                'testId' => $testId,
                'type' => $request->input('type'),
            ]);
    
            $testType->save();
            return redirect('testTypeFolder/testType')->with('success', 'Successfuly added test type');
    
        }
        else {
            return redirect('testTypeFolder/testType/create')->with('error', 'Test doesn\'t exist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\TestType  $testType
     * @return \Illuminate\Http\Response
     */
    public function show(TestType $testType)
    {
        return view('testTypeFolder/testTypeShow')->with('testType', $testType);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\TestType  $testType
     * @return \Illuminate\Http\Response
     */
    public function edit(TestType $testType)
    {
        return view('testTypeFolder/testTypeEdit')->with('testType', $testType);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\TestType  $testType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestType $testType)
    {
        $testType->testId = $request->input('testId');
        $testType->type = $request->input('type');

        $testType->save();

        return redirect('testTypeFolder/testType')->with('success', 'Test type updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\TestType  $testType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestType $testType)
    {
        $testType->delete();

        return redirect('testTypeFolder/testType')->with('success', 'Test type deleted');

    }
}
