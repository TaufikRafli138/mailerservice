<?php

namespace App\Exports;

use App\Models\JobRequisitionUserApplied;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DownloadDataExport implements FromCollection, WithHeadings, WithCustomStartCell, WithStyles, WithTitle, ShouldAutoSize, WithEvents
{
    private $printArea = 'A:K';
    protected $data;
    protected $filteringData;

    public function setData($filteringData)
    {
        $this->filteringData = $filteringData;
        return $this;
    }

    public function collection()
    {
        $filteringData = $this->filteringData;
        $formattedResult = JobRequisitionUserApplied::getRecordOfAll($filteringData);
        return $formattedResult;
    }

    public function headings(): array
    {
        return [
            'Opportunity',
            'Jobs Category',
            'Name Applicant',
            'Division',
            'Unit',
            'Group Job',
            'Age',
            'Gender',
            'Degree',
            'Major',
            'Category',
            'Status',
            'Detail Status',

        ];
    }


    public function startCell(): string
    {
        return 'A2';
    }

    public function styles(Worksheet $sheet)
    {
        $drawing = new Drawing();
        $drawing->setName('Citilink Logo');
        $drawing->setDescription('Citilink Logo');
        $drawing->setPath(public_path('kop-surat.jpg'));
        $drawing->setHeight(150);
        $drawing->setCoordinates('A1');
        $drawing->setWorksheet($sheet);
        $sheet->mergeCells('A1:C1');
        $sheet->getRowDimension(1)->setRowHeight(130);
        $drawing->setOffsetX(2);
        $drawing->setOffsetY(5);
    }


    public function title(): string
    {
        return 'Laporan Data';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A2:M2')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A2:M2')->getBorders()->getBottom()->setBorderStyle('thin');
                $event->sheet->getDelegate()->getStyle('A2:M2')->applyFromArray([
                    'font' => [
                        'color' => ['rgb' => '000000'],
                    ],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => 'e1f2e9'],
                    ],
                ]);
                $highestRow = $event->sheet->getDelegate()->getHighestRow();
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
                $columnRange = range('A', $highestColumn);
                foreach ($columnRange as $column) {
                    if (ord($column) <= ord('L')) {
                        $event->sheet->getDelegate()->getStyle($column . '2:' . $column . $highestRow)->getBorders()->getRight()->setBorderStyle('thin');
                    }
                    $event->sheet->getDelegate()->getPageSetup()->setPrintArea($this->printArea);
                    $event->sheet->getDelegate()->getStyle($column . '2:' . $column . $highestRow)->getAlignment()->setHorizontal('center');
                    $event->sheet->getDelegate()->getStyle($column . '2:' . $column . $highestRow)->applyFromArray(['font' => ['name' => 'Arial', 'size' => 6,],]);
                }

            },

        ];
    }

}



