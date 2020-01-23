<?php

namespace App\Http\Controllers;

use App\Entity\TestProvider;
use Illuminate\Http\Request;

class TestProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testProviders = TestProvider::paginate(10);
        return view('testProviderFolder/testProvider')->with('testProviders', $testProviders);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testProviderFolder/testProviderNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testProvider = new TestProvider([
            'name' => $request->input('name'),
            'promote' => $request->input('promote'),
        ]);

        $testProvider->save();
        return redirect('testProviderFolder/testProvider')->with('success', 'Successful added test provider');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\TestProvider  $testProvider
     * @return \Illuminate\Http\Response
     */
    public function show(TestProvider $testProvider)
    {
        return view('testProviderFolder/testProviderShow')->with('testProvider', $testProvider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\TestProvider  $testProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(TestProvider $testProvider)
    {
        return view('testProviderFolder/testProviderEdit')->with('testProvider', $testProvider);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\TestProvider  $testProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestProvider $testProvider)
    {
        $testProvider->name = $request->input('name');
        $testProvider->promote = $request->input('promote');

        $testProvider->save();
        
        return redirect('testProviderFolder/testProvider')->with('success', 'Test Provider Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\TestProvider  $testProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestProvider $testProvider)
    {
        $testProvider->delete();

        return redirect('testProviderFolder/testProvider')->with('success', 'Test Provider Deleted');

    }
}
