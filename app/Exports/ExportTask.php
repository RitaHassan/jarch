<?php

namespace App\Exports;

use App\Models\Tasks;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;


class ExportTask implements FromView ,ShouldAutoSize,WithEvents
{
    use Exportable;

    public $search;
    public $MEM_ID;
    public $COMPLETION_STATUS;
    public $SYSTEM_ID;
    public $PLANNED_START_DT_FIRST;
    public $PLANNED_START_DT_LAST;
    public $ACTUAL_START_DT_FIRST;
    public $ACTUAL_START_DT_LAST;
    public $all;
    public function __construct($search,$MEM_ID,$COMPLETION_STATUS,$SYSTEM_ID,$PLANNED_START_DT_FIRST,$PLANNED_START_DT_LAST,$ACTUAL_START_DT_FIRST,$ACTUAL_START_DT_LAST,$all=0)
    {
       $this->search = $search;
       $this->MEM_ID = $MEM_ID;
       $this->COMPLETION_STATUS = $COMPLETION_STATUS;
       $this->SYSTEM_ID = $SYSTEM_ID;
       
       $this->PLANNED_START_DT_FIRST = $PLANNED_START_DT_FIRST;
       $this->PLANNED_START_DT_LAST = $PLANNED_START_DT_LAST;
       $this->ACTUAL_START_DT_FIRST = $ACTUAL_START_DT_FIRST;
       $this->ACTUAL_START_DT_LAST = $ACTUAL_START_DT_LAST;

       $this->all = $all;
    }


   /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {

        ini_set('memory_limit', '-1');
        set_time_limit(0);
        if($this->all ==0){
            $tasks = Tasks::ALL_DATA($this->search,$this->MEM_ID,$this->COMPLETION_STATUS,$this->SYSTEM_ID,$this->PLANNED_START_DT_FIRST,$this->PLANNED_START_DT_LAST,$this->ACTUAL_START_DT_FIRST,$this->ACTUAL_START_DT_LAST)['data'];
        }else{
            $tasks = Tasks::ALL_DATA($this->search,$this->MEM_ID,$this->COMPLETION_STATUS,$this->SYSTEM_ID,$this->PLANNED_START_DT_FIRST,$this->PLANNED_START_DT_LAST,$this->ACTUAL_START_DT_FIRST,$this->ACTUAL_START_DT_LAST)['data'];
        }
        return view('tasks.export', [
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
