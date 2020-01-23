<?php

namespace App\Exports;

use App\Entity\BaseTestCenter;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class BaseTCExportForJarvis implements WithHeadings, WithMapping
, Responsable, FromCollection
// FromQuery
{
    use Exportable;
    
    private $fileName = "baseTestCentersForJarvis.xlsx";
    private $writerType = Excel::XLSX;
    

    public function collection()
    {
        $baseTCs = BaseTestCenter::get();

        return $baseTCs;
    }

    public function headings(): array
    {
        return [
            'ieltsId',
            'testCenterAssociation',
            'centerNumber',
            'venue',
            'cityId',
            'testProvider',
            'name',
            'shortDescription',
            'clickoutURLId',
        ];
    }

    public function map($baseTCs): array
    {
        if(empty($baseTCs->clickoutURL)){
            $baseTCs->clickoutURLData = null;
        } else {
            $baseTCs->clickoutURLData = $baseTCs->clickoutURL->shortTrackingLink;
        }
        $return = [
            $baseTCs->ieltsId,
            $baseTCs->testCenterAssociation,
            $baseTCs->centerNumber,
            $baseTCs->venue,
            $baseTCs->cityId,
            $baseTCs->testProviderId, 
            $baseTCs->name,
            $baseTCs->description,
            $baseTCs->clickoutURLData
        ];

        return $return;
    }
}