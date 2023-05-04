<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;


class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('systems.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $system = new System();
          $member2= $system->teamSelect()['data'];

          return view('systems.form',compact('system','member2'));
        
    }

    public function datatable(Request $request)
    {
        $search = null;
        if($request->search['value'] != ""){
            $search = $request->search['value'];
        }
       return json_encode(System::LOAD_DATA($search,0,10));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
   
      $request->validate([
            'TEAM_ID' => 'required',
            'SYSTEM_NUM' => 'required',
            'SYSTEM_NAME' => 'required',
            'ACTIVE' => 'required'

        ]);
      // dd('request');

     $system = new System();
     $request->request->add(['CREATED_BY' => 1]);
        $result = System::Save_(change_key($request->only($system->getFillable())));
      // dd($result);
        return back()->with('success', 'تمت عملية الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system = new System();
        $member2= $system->teamSelect()['data'];
       // dd($member2);
        $system  = $system->find_by_id($id);
        if (!$system) {
            abort(404);
        }
        return view('systems.form',compact('system','member2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'TEAM_ID' => 'required',
            'SYSTEM_NUM' => 'required',
            'SYSTEM_NAME' => 'required',
            'ACTIVE' => 'required'
        ]);
       

        $system = new System();
        $system = $system->find_by_id($id);
        if (!$system) {
            abort(404);
        }
      
        $request->request->add(['UPDATED_BY' => 1,'ID'=>$id]);
        $result = System::Update_(change_key($request->only((new System())->getFillable())));
        return back()->with('success', 'تمت عملية الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $system = new System();
        if ($system->find_by_id($id)) {
            $system->delete_by_id($id);
        }
        return [];
    }


}
