<?php

namespace App\Imports;

use App\Entity\BaseTestCenter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BaseTestCenterImport implements ToModel, WithHeadingRow, WithBatchInserts
                            , WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BaseTestCenter([
            'ieltsId' => $row['ieltsid'],
            'testCenterAssociation' => $row['testcenterassociation'],
            'centerNumber' => $row['centernumber'],
            'venue' => $row['venue'],
            'cityId' => $row['cityid'],
            'testProviderId' => $row['testprovider'],
            'name' => $row['name'],
            'description' => $row['shortdescription'],
            'clickoutURLId' => $row['clickouturlid'],
            
        ]);
    }

    public function batchSize(): int
    {
        return 50;
    }

    public function chunkSize(): int
    {
        return 51;
    }
}
