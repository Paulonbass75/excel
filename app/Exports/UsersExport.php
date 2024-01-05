<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray, WithHeadings
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
        return [
            [
            '#',
            'Name',
            'Email',
            'Address',
            'Phone Number'
            ],
           [ 'Row 2',
            'Name',
            'Email',
            'Address',
            ']Phone Number'
        ]
        ];

        }
    /**
     * @return array
     */
     public function array(): array
     {
         return $this->data->toArray();
     }
}