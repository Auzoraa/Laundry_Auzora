<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Iluminate\Support\Facedes\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Event\BeforeExport;
use Maatwebsite\Excel\Event\AfterSheet;
use \Maatwebsite\Excel\Sheet;


class MemberExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::all();
    }

    public function headings(): array
    {
        return [
            'No. ',
            'Nama',
            'Alamat', 
            'Jenis Kelamin',
            'No.Phone',
            'Tanggal Input',
            'Tanggal Update'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getColumDimension('A')->setAutoSize(true);
                $event->sheet->getColumDimension('B')->setAutoSize(true);
                $event->sheet->getColumDimension('C')->setAutoSize(true);
                $event->sheet->getColumDimension('D')->setAutoSize(true);
                $event->sheet->getColumDimension('E')->setAutoSize(true);
                $event->sheet->getColumDimension('F')->setAutoSize(true);
                $event->sheet->getColumDimension('G')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:G2');
                $event->sheet->setCellValue('A1', 'Data Member');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadshhet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:G'.$event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpeadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ]
                ]);
            }
        ];
    }
}