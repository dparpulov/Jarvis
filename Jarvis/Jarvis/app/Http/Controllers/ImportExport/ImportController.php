<?php

namespace App\Http\Controllers\ImportExport;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ImportController extends Controller
{
    /* 
     * Takes the selected file and imports the data to
     * the Country, state and city tables using the CSCImport model
     */
    public function importCSC(Request $request)
    {
        set_time_limit(300);
        $import = Excel::import(new \App\Imports\CcsSheetsImport(), $request->file('import_file'));

        return redirect('countryFolder/country')->with('success', 'Countries imported');
    }

    /* 
     * Takes the selected file and imports the data to
     * the Country table using the countryImport model
     */
    public function importBaseTestCenter(Request $request)
    {
        set_time_limit(300);
        $import = Excel::import(new \App\Imports\BaseTestCenterImport(), $request->file('import_file'));

        return redirect('baseTCFolder/baseTC')->with('success', 'Base test centers imported');
    }

    /* 
     * Takes the selected file and imports the data to
     * the clickout_u_r_l table using the clickoutURLImport model
     */
    public function importURL(Request $request)
    {
        $import = Excel::import(new \App\Imports\ClickoutURLImport(), $request->file('import_file'));

        return redirect('urlFolder/url')->with('success', 'Clickout URL\'s imported');
    }

    /* 
     * Takes the selected file and imports the data to
     * the raw_test_date table using the rawTestDateImport model
     */
    public function importRawTestDate(Request $request)
    {
        set_time_limit(300);

        $fileName = $request->file('import_file')->getClientOriginalName();
        $fileSize = $request->file('import_file')->getSize();
        $timeOfUpload = Carbon::now();

        $importFile = new \App\Entity\importFile([
            'fileName' => $fileName,
            'size' => $fileSize,
            'uploadTime' => $timeOfUpload
        ]);

        $importFile->save();

        $row['importFileId'] = $importFile->id;

        $import = Excel::import(new \App\Imports\RawTestDateImport($importFile->id), $request->file('import_file'));

        return redirect('rawTestDateFolder/rawTestDate')->with('success', 'Raw test dates imported');
    }
}