<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExpenseExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;
    protected $FormIds;
    public function __construct($FormIds)
    {
        $this->FormIds = $FormIds;
    }

    public function map($expense): array
    {
        return
            [
                $expense->Item,
                $expense->Description,
                $expense->Amount,
                $expense->Currency,
                $expense->UFirstName,
            ];
    }

    public function headings(): array
    {
        return
            [
                'Item',
                'Description',
                'Amount',
                'Currency',
                'Created By',

            ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $event->sheet->getStyle('A2:G10000')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '31869B'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => ['argb' => '31869B']
                    ],
                    'font' => [
                        'name'      =>  'Calibri',
                        'size'      =>  14,
                        'bold'      =>  true,
                        'color' => array('rgb' => 'FFFFFF')
                    ],
                ]);
            }
        ];
    }

    public function query()
    {
        return Expense::join('users as a', 'expenses.Created_By', '=', 'a.id')
        ->join('look_ups as b', 'expenses.Item_ID', '=', 'b.id')
        ->join('look_ups as c', 'expenses.Currency_ID', '=', 'c.id')
        ->select('expenses.*', 'a.FirstName as UFirstName', 'a.LastName as ULastName', 'b.Name as Item', 'c.Name as Currency')
        
        ->whereIn('expenses.id', $this->FormIds);
    }
}
