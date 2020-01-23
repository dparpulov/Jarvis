<?php

namespace App\Imports;

use App\Entity\City;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class CityImport implements ToModel, WithHeadingRow,
                            WithBatchInserts, WithChunkReading
                            , ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new City([
            'id' => $row['id'],
            'countryId' => $row['countryid'],
            'stateId' => $row['stateid'],
            'name' => $row['name'],
            'alternativeName' => $row['alternativename'],
            'lng' => $row['lng'],
            'lat' => $row['lat'],
            'description' => $row['description'],
            'inhabitants' => $row['inhabitants'],

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
