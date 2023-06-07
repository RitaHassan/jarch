<?php

namespace App\Exports;

use App\Models\System;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class ExportSystem implements FromView ,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $ACTIVE ;

    public function __construct($ACTIVE)
    {
        $this->ACTIVE = $ACTIVE;

    }


    public function view(): View
    {

        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $systems = System::LOAD_DATA(null,0,10,$this->ACTIVE)['data'];
        return view('systems.export', [
            'systems' => $systems,
        ]);

    }

     /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class  => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft("ar");
            },
        ];
    }
}
