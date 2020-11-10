<?php

namespace App\Imports;

use App\Models\Audience;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AudienceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!Audience::where('email_address', '=', $row['email_address'])->exists()) {

            return new Audience([

                "first_name" => $row["first_name"],
                "last_name" => $row["last_name"],
                "email_address" => $row["email_address"],
                "segment" => $row["segment"],
                "status" => $row["status"],

            ]);
        }

    }
}
