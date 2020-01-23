<?php

namespace App\Imports;

use App\Entity\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CountryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Country([
            'id' => $row['id'],
            'spId' => $row['spid'],
            'name' => $row['name'],
            'continent' => $row['continent'],
            'currencyCode' => $row['currencycode'],
            'currencyName' => $row['currencyname'],
            'geonameId' => $row['geonameid'],

        ]);
    }

}
