<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel



{
    public function model(array $row) {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'phone_no' => $row[2],
            'password' => $row[3],
            'address' => $row[4],
        ]);
    }
}
