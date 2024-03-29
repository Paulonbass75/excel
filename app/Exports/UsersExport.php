<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;




class UsersExport implements WithMultipleSheets
// , WithEvents
{
        use Exportable;
        protected $data;
  

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [];
        foreach($this->data as $user){
            $sheets[] = new UserSheetExport($user);
        }
        return $sheets;
    }
   
}