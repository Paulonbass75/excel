<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
Use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromArray, WithHeadings, WithMapping
// , WithEvents
{
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * @return array
     */
    public function headings(): array {
       $headings = [];
         foreach ($this->data->toArray()[0] as $key => $value) {
             $headings[] = User::HEADINGS[$key]; 

        }
        return $headings;
    }
     public function array(): array
     {
         return $this->data->toArray();
     }

    /**
     * @param mixed $row    
     * @return array
     */
    public function map($row): array
    {
        return [
            $row['id'],
            $row['name'],
            $row['email'],
            $row['address'],
            $row['phone_no']
        ];
    }
}