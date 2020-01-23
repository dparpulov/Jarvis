<?php

namespace App\Imports;

use App\Entity\State;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StateImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new State([
            'id' => $row['id'],
            'countryId' => $row['countryid'],
            'name' => $row['name'],
            'stateCode' => $row['statecode'],

        ]);
    }
}
