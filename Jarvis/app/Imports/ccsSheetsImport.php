<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CcsSheetsImport implements WithMultipleSheets 
{
    public function sheets(): array
    {
        return [
            'countries' => new CountryImport(),
            'states' => new StateImport(),
            'cities' => new CityImport(),
        ];
    }
}