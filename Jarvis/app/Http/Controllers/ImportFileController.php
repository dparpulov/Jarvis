<?php

namespace App\Http\Controllers;

use App\Entity\importFile;
use App\Entity\RawTestDate;

use Illuminate\Http\Request;

class ImportFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $importFiles = importFile::withCount('rawTestDates')->paginate(10);
        return view('importFileFolder/importFile')->with('importFiles', $importFiles);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('importFileFolder/importFileNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $importFile = new ImportFile([
            'fileName' => $request->input('fileName'),
            'size' => $request->input('size')

        ]);

        $importFile->save();
        return redirect('importFileFolder/importFile')->with('success', "Successfully created importFile");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\importFile  $importFile
     * @return \Illuminate\Http\Response
     */
    public function show(importFile $importFile)
    {
        $rawTestDatesPaginated = RawTestDate::where('importFileId',$importFile->id)->paginate(10);

        return view('importFileFolder/importFileShow')->with(compact('importFile', 'rawTestDatesPaginated'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\importFile  $importFile
     * @return \Illuminate\Http\Response
     */
    public function edit(importFile $importFile)
    {
        return view('importFileFolder/importFileEdit')->with('importFile', $importFile);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\importFile  $importFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, importFile $importFile)
    {
        $importFile->fileName = $request->input('fileName');
        $importFile->size = $request->input('size');

        $importFile->save();
        return redirect('importFileFolder/importFile')->with('success', "Successfully updated importFile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\importFile  $importFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(importFile $importFile)
    {
        $importFile->delete();
        
        return redirect('importFileFolder/importFile')->with('success', 'Import file deleted');
    }
}
