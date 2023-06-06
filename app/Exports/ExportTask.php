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
    public $ACTUAL_FINISH_MONTH;
    public $ACTUAL_FINISH_YEAR;
    public $MEM_ID;
    public $COMPLETION_STATUS;
    public $SYSTEM_ID;
    public $all;
    public function __construct($search,$ACTUAL_FINISH_MONTH,$ACTUAL_FINISH_YEAR,$MEM_ID,$COMPLETION_STATUS,$SYSTEM_ID,$all=0)
    {
       $this->search = $search;
       $this->ACTUAL_FINISH_MONTH = $ACTUAL_FINISH_MONTH;
       $this->ACTUAL_FINISH_YEAR = $ACTUAL_FINISH_YEAR;
       $this->MEM_ID = $MEM_ID;
       $this->COMPLETION_STATUS = $COMPLETION_STATUS;
       $this->SYSTEM_ID = $SYSTEM_ID;
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
            $tasks = Tasks::ALL_DATA($this->search,$this->ACTUAL_FINISH_MONTH,$this->ACTUAL_FINISH_YEAR,$this->MEM_ID,$this->COMPLETION_STATUS,$this->SYSTEM_ID)['data'];
        }else{
            $tasks = Tasks::ALL_DATA($this->search,$this->ACTUAL_FINISH_MONTH,$this->ACTUAL_FINISH_YEAR,$this->MEM_ID,$this->COMPLETION_STATUS,$this->SYSTEM_ID)['data'];
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
