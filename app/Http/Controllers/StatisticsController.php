<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = new Statistics();
        $TOTAL_COUNT=$statistics->teams_count()['data'];

       //dd($TOTAL_COUNT);
        $TOTAL_MEMBERS= $statistics->members_count()['data'];
        $TOTAL_SYSTEMS= $statistics->systems_count()['data'];
        $SYSTEMS_DISABLE= $statistics->systems_disable()['data'];
        $TASKS_COUNT= $statistics->tasks_count()['data'];
        $COMPLETED_TASKS= $statistics->completed_tasks_count()['data'];
        $MY_TOTAL_TASKS= $statistics->my_tasks_count((session('user')['user_id']))['data'];
        $MY_COMPLETED_TASKS= $statistics->my_completed_tasks_count((session('user')['user_id']))['data'];
        $LAST_TOTAL_TASKS= $statistics->last_tasks_count((session('user')['user_id']))['data'];
        $MY_LAST_TOTAL_TASKS= $statistics->my_last_completed_tasks_count((session('user')['user_id']))['data'];
        $MY_TASKS_YEAR= $statistics->tasks_count_year()['data'];
        $MY_COMPLETED_TASKS_YEAR= $statistics->tasks_completed_year()['data'];
         // dd($MY_TASKS_YEAR);
  //DD($MY_LAST_TOTAL_TASKS);
        return view('welcome',compact('TOTAL_COUNT'
        ,'TOTAL_MEMBERS','TOTAL_SYSTEMS','SYSTEMS_DISABLE' 
       ,'TASKS_COUNT','COMPLETED_TASKS','MY_TOTAL_TASKS','MY_COMPLETED_TASKS',
       'LAST_TOTAL_TASKS','MY_LAST_TOTAL_TASKS','MY_TASKS_YEAR','MY_COMPLETED_TASKS_YEAR'));
    }
   



}
