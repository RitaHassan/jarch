<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Test;


class TestController extends Controller
{
    public function index(){
 
    return view('team\create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'TEAM_NAME' => 'required'
        ]);
        $team = new team();
        $result = team::SaveTeamName(change_key($request->only($team->getFillable())));
        return back()->with('success', 'تمت عملية الحفظ بنجاح');
    }
}







?>