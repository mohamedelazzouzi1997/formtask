<?php

namespace App\Imports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\ToModel;

class FormImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Form([
            'firstName' => $row[0],
            'lastName' => $row[1],
            'email' => $row[2],
            'dateOfBirth' => $row[3],
            'phone' => $row[4],
            'country' => $row[5],
            'city' => $row[6],
            'referal' => $row[7],
            'is_confirmed' => 0,
            'sales' => $row[8]
        ]);
    }
}