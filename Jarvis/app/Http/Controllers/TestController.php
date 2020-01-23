<?php

namespace App\Http\Controllers;

use App\Entity\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate(10);
        return view('testFolder/test')->with('tests', $tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testFolder/testNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = new Test([
            'name' => $request->input('name'),
        ]);

        $test->save();
        return redirect('testFolder/test')->with('success', 'Successfuly added test');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return view('testFolder/testShow')->with('test', $test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('testFolder/testEdit')->with('test', $test);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $test->name = $request->input('name');

        $test->save();

        return redirect('testFolder/test')->with('success', 'Test updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();

        return redirect('testFolder/test')->with('success', 'Test deleted');
    }
}
