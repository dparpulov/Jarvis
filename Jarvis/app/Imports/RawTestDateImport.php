<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class RawTestDateImport implements WithMultipleSheets, WithBatchInserts
                            , WithChunkReading 
{
    public $importFileId;

    public function __construct($importFileId){
        $this->importFileId = $importFileId;
        
    }

    public function sheets(): array
    {
        return [
            'ORS' => new ORSImport($this->importFileId),
            'UKVI' => new UKVIImport($this->importFileId),

        ];
    }


    public function batchSize(): int
    {
        return 200;
    }

    public function chunkSize(): int
    {
        return 200;
    }
}