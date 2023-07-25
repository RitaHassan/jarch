<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportTeamNum;

class ReportController extends Controller
{

    public function exportTeamNum(Request $request)
    {
        \LogActivity::addToLog(StaticCode::$teams,null,StaticCode::$export,StaticCode::$page,' التقرير الفرق ');

        return Excel::download(new ExportTeamNum(), 'teams.xlsx');


    }

    public function exportTaskNum(Request $request)
    {
        \LogActivity::addToLog(StaticCode::$teams,null,StaticCode::$export,StaticCode::$page,' التقرير الفرق ');

        return Excel::download(new ExportTeamNum(), 'teams.xlsx');


    }
}
