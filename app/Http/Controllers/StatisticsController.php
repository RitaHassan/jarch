<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;

use App\Models\System;
use App\Models\Team;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = new Statistics();
        $TOTAL_COUNT=$statistics->teams_count()['data'];

        $TOTAL_MEMBERS= $statistics->members_count()['data'];
        $TOTAL_SYSTEMS= $statistics->systems_count()['data'];
        $SYSTEMS_DISABLE= $statistics->systems_disable()['data'];
        $TASKS_COUNT= $statistics->tasks_count()['data'];
        $COMPLETED_TASKS= $statistics->completed_tasks_count()['data'];
        $MY_TASKS_YEAR= $statistics->tasks_count_year()['data'];
        $MY_COMPLETED_TASKS_YEAR= $statistics->tasks_completed_year()['data'];
        if(session('is_employee')){
            $MY_TOTAL_TASKS= $statistics->my_tasks_count((session('user')['user_id']))['data'];
            $MY_COMPLETED_TASKS= $statistics->my_completed_tasks_count((session('user')['user_id']))['data'];
            $LAST_TOTAL_TASKS= $statistics->last_tasks_count((session('user')['user_id']))['data'];
            $MY_LAST_TOTAL_TASKS= $statistics->my_last_completed_tasks_count((session('user')['user_id']))['data'];
          
        }else{
            $MY_TOTAL_TASKS = 0;
            $MY_COMPLETED_TASKS = 0;
            $LAST_TOTAL_TASKS = 0;
            $MY_LAST_TOTAL_TASKS = 0;
        }
        

        return view('welcome',compact('TOTAL_COUNT'
        ,'TOTAL_MEMBERS','TOTAL_SYSTEMS','SYSTEMS_DISABLE' 
       ,'TASKS_COUNT','COMPLETED_TASKS','MY_TOTAL_TASKS','MY_COMPLETED_TASKS',
       'LAST_TOTAL_TASKS','MY_LAST_TOTAL_TASKS','MY_TASKS_YEAR','MY_COMPLETED_TASKS_YEAR'));
    }


   /* public function index_view()
    {
        dd('ll');
        $systems= System::LOAD_DATA(null,0,100,1)['data'];
        $teams = Team::LOAD_DATA(null,0,100,1)['data'];
        return view('tasks.index_all',compact('systems','teams'));
    }*/

    public function Table_Statistics(Request $request)
    {

        $search = null;
        $search2 = null;
        $search3 = null;
        $search4 = null;
        $search5 = null;


        if($request->search['value'] != ""){
            $search = $request->search['value'];
        }
        $PLANNED_START_DT = explode('-',$request->PLANNED_START_DT);
        $PLANNED_START_DT_FIRST = isset($PLANNED_START_DT[0]) ? trim($PLANNED_START_DT[0]):null;
        $PLANNED_START_DT_LAST = isset($PLANNED_START_DT[1]) ? trim($PLANNED_START_DT[1]):null;

        $ACTUAL_START_DT = explode('-',$request->ACTUAL_START_DT);
        $ACTUAL_START_DT_FIRST = isset($ACTUAL_START_DT[0]) ? trim($ACTUAL_START_DT[0]):null;
        $ACTUAL_START_DT_LAST = isset($ACTUAL_START_DT[1]) ? trim($ACTUAL_START_DT[1]):null;
       return json_encode(Statistics::STATISTICS_status($request->MEM_ID,$request->COMPLETION_STATUS,$request->SYSTEM_ID,
       $PLANNED_START_DT_FIRST,$PLANNED_START_DT_LAST,$ACTUAL_START_DT_FIRST,$ACTUAL_START_DT_LAST,$request->start,$request->length));
    }



}
