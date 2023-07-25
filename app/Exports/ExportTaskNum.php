<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class ExportTaskNum implements FromView ,ShouldAutoSize,WithEvents
{
    use Exportable;

    public function __construct()
    {

    }


   /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        ini_set('memory_limit', '-1');
        set_time_limit(0);

        $tasks = Report::TASK_RET()['data'];
        // dd(  $tasks);
        return view('tasks.exportNum', [
            'tasks' => $tasks,
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
