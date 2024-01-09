<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserSheetExport implements WithTitle, WithHeadings, FromQuery, WithMapping, WithColumnWidths, WithStyles
{
    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    /**
     * @return string
     */
    public function title(): string {
        return $this->user->name;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Notes',
            'Status',
            'Amount',
        ];
    }
    public function query()
    {
        return Order::where('user_id', $this->user->id);
    }
    public function map($row): array
    {
        return [
            $row->{'id'},
            $row->{'notes'},
            $row->{'status'},
            $row->{'amount'},
        ];
    }
    
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 55,
            'C' => 20,
            'D' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}