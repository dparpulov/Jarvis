<?php

namespace App\Imports;

use App\Entity\ClickoutURL;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ClickoutURLImport implements ToModel, WithHeadingRow, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ClickoutURL([
            'trackingLinkName' => $row['trackinglinkname'],
            'shortTrackingLink' => $row['shorttrackinglink'],
            'landingPage' => $row['landingpage'],
            'clickmeterCreationDate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['creationdate']),

        ]);
    }

    public function batchSize(): int{
        return 50;
    }
}
