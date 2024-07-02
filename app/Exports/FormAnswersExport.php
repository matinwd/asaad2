<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Modules\User\Models\User;

class FormAnswersExport implements FromQuery, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    protected $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return $this->form->answers();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return array_filter(collect($this->form->content_two)->pluck('label')->toArray());
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($item): array
    {
        return $item->data;
    }


    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $styleArray = ['font' => ['bold' => true]];
        return [
            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {

                // bold heading
                $event->sheet->getStyle('A1:Z1')
                    ->applyFromArray($styleArray);

                // change direction to rtl
                $event->sheet->setRightToLeft(true);
                // center all text

                $event->sheet
                    ->getStyle("A1:F10000")
                    ->getAlignment()->setHorizontal('center');
            },
        ];
    }
}
