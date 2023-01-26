<?php

namespace App\Imports;

use App\Models\Form;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FormImport implements ToModel,WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $form = new Form([
            'firstName' => $row['firstname'],
            'lastName' => $row['lastname'],
            'email' => $row['email'],
            'dateOfBirth' => $row['dateofbirth'],
            'phone' => $row['phone'],
            'country' => $row['country'],
            'city' => $row['city'],
            'referal' => $row['referal'],
            'is_confirmed' => 0,
            'sales' => $row['sales'],
            'created_at' => $row['created_at']
        ]);
        if($form)
            return $form;

        return back()->with([
            'status' => 'something went wrong'
        ]);
    }


}
