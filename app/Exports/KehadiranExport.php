<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;


class KehadiranExport implements FromView, WithEvents
{
    use Exportable;
    
    protected $data       = array();
    protected $mulai;
    protected $selesai;
    protected $waktu;

    public function __construct($data, $mulai, $selesai, $waktu)
    {
        $this->data    = $data;
        $this->mulai   = $mulai;
        $this->selesai = $selesai;
        $this->waktu   = $waktu;
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {

                // last column as letter value (e.g., D)
                $last_column = Coordinate::stringFromColumnIndex(count($this->results[0]));

                // calculate last row + 1 (total results + header rows + column headings row + new row)
                $last_row = count($this->results) + 2 + 1 + 1;

                // set up a style array for cell formatting
                $style_text_center = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ]
                ];

                // at row 1, insert 2 rows
                $event->sheet->insertNewRowBefore(1, 2);

                // merge cells for full-width
                $event->sheet->mergeCells(sprintf('A1:%s1',$last_column));
                $event->sheet->mergeCells(sprintf('A2:%s2',$last_column));
                $event->sheet->mergeCells(sprintf('A%d:%s%d',$last_row,$last_column,$last_row));

                // assign cell values
                $event->sheet->setCellValue('A1','Top Triggers Report');
                $event->sheet->setCellValue('A2','SECURITY CLASSIFICATION - UNCLASSIFIED [Generator: Admin]');
                $event->sheet->setCellValue(sprintf('A%d',$last_row),'SECURITY CLASSIFICATION - UNCLASSIFIED [Generated: ...]');

                // assign cell styles
                $event->sheet->getStyle('A1:A2')->applyFromArray($style_text_center);
                $event->sheet->getStyle(sprintf('A%d',$last_row))->applyFromArray($style_text_center);
            },
        ];
    }

    public function view(): View
    {
        return view('export.xml', [
            'user'      => $this->data,
            'mulai'     => $this->mulai,
            'selesai'   => $this->selesai,
            'waktu'     => $this->waktu
        ]);
    }
}
