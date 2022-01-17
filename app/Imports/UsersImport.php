<?php

namespace App\Imports;

use App\Models\Users;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Users([
                      //
            'name'     => $row['name'],
            'phoneNumber' => $row['phoneNumber'],
            'email' =>   $row['email'],
            'address' => $row['address'],

         
        ]);
    }
}