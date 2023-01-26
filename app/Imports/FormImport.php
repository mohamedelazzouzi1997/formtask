<?php

namespace App\Imports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\ToModel;

class FormImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Form([
            'firstName' => $row['firstName'],
            'lastName' => $row['lastName'],
            'email' => $row['email'],
            'dateOfBirth' => $row['dateOfBirth'],
            'phone' => $row['phone'],
            'country' => $row['country'],
            'city' => $row['city'],
            'referal' => $row['referal'],
            'is_confirmed' => 0,
            'sales' => $row['sales']
        ]);
    }
}
