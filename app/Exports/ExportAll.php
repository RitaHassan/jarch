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

class ExportAll implements FromView ,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $ACTIVE ;

    public function __construct()
    {


    }


    public function view(): View
    {

        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $systems = System::ALL_DATA(0,10)['data'];
        return view('systems.exportAll', [
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
