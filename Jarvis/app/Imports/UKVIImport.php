<?php

namespace App\Imports;

use App\Entity\RawTestDate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class UKVIImport implements ToModel, WithHeadingRow,
                            WithBatchInserts, WithChunkReading
                            , ShouldQueue
{
    public $importFileId;

    public function __construct($importFileId){
        $this->importFileId = $importFileId;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RawTestDate([
            'importFileId' => $this->importFileId,
            'sheet' => 'UKVI',
            'country' => $row['country'],
            'center' => $row['centre'],
            'centerNumber' => $row['centrenumber'],
            'venue' => $row['venue'],
            'town' => $row['town'],
            'testDate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['examdate']),
            'testName' => $row['examname'] ?? $row['exam_name'],
            'testFee' => $row['testfee'] ?? $row['test_fee'],
            'feeCurrency' => $row['feecurrency'] ?? $row['fee_currency'],
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
