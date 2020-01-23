<?php

namespace App\Http\Controllers\ImportExport;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ExportController extends Controller
{
    public function exportBaseTCForLameco()
    {
        set_time_limit(300);

        return new \App\Exports\BaseTCExportForLameco();
    }

    public function exportBaseTCForJarvis()
    {
        set_time_limit(300); 

        return new \App\Exports\BaseTCExportForJarvis();
    }

    public function exportLinkedDate()
    {
        set_time_limit(300);

        //(new \App\Exports\LinkedDateExport)->store('testDatesCollection.xlsx');

        return new \App\Exports\LinkedDateExport();
        //return back()->withSuccess('Export started!');
    }
}