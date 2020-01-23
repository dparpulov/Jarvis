<?php

namespace App\Exports;

use App\Entity\EditTestDate;

use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Queue\ShouldQueue;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class LinkedDateExport implements WithHeadings, WithMapping
, Responsable, ShouldQueue
//, FromQuery
, FromCollection
{
    use Exportable;
    
    private $fileName = "_test_dates_collection.xlsx";
    
    private $writerType = Excel::XLSX;

    // public function query()
    // {
    //     $linkedDates = EditTestDate::query()->where('baseTestCenterId', '!=', 0);

    //     return $linkedDates;
    // }
    

    public function __construct(){
        $this->fileName = date("Ymd") . "_test_dates_collection.xlsx";
    }

    public function collection()
    {
        $linkedDates = EditTestDate::where('baseTestCenterId', '!=', 0)->get();

        return $linkedDates;
    }

    public function headings(): array
    {
        return [
            'id',
            'entity',
            'entity_id',
            'test_type',
            'test_date',
            'results_date',
            'test_fee',
            'test_fee_currency'
        ];
    }

    public function map($linkedEditTestDates): array
    {
        return [
            "",
            $linkedEditTestDates->regularTestDate,
            $linkedEditTestDates->baseTestCenter->ieltsId,
            $linkedEditTestDates->testTypeId,
            $linkedEditTestDates->testDate,
            Carbon::parse($linkedEditTestDates->testDate)->addDays(13)->toDateString(),
            $linkedEditTestDates->testFee,
            $linkedEditTestDates->feeCurrency

        ];
    }
}