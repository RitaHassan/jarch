<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.index');
    }

    public function datatable(Request $request)
    {
        $search = null;
        if($request->search['value'] != ""){
            $search = $request->search['value'];
        }
       return json_encode(Team::LOAD_DATA($search,0,10));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = new Team();
        return view('teams.form',compact('team'));
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
            'NAME' => 'required'
        ]);

        $team = new Team();
        $request->request->add(['CREATED_BY' => 1]);
        $result = Team::Save_(change_key($request->only($team->getFillable())));
        return back()->with('success', 'تمت عملية الحفظ بنجاح');
     //   return view('systems.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


 
    public function edit($id)
    {
        $team = new Team();
        $team  = $team->find_by_id($id);
        if (!$team) {
            abort(404);
        }
        return view('teams.form',compact('team'));
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
            'NAME' => 'required'
        ]);

        $team = new Team();
        $team = $team->find_by_id($id);
        if (!$team) {
            abort(404);
        }
        $request->request->add(['UPDATED_BY' => 1,'ID'=>$id]);
        $result = Team::Update_(change_key($request->only((new Team())->getFillable())));
        return [];
        // return back()->with('success', 'تمت عملية الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = new Team();
        if ($team->find_by_id($id)) {
            $team->delete_by_id($id);
        }
        return [];
    }


    public function giveMembers($TEAM_ID)
    { 

       $team=new Team();
       $X= $team->giveMembers($TEAM_ID)['data'];
      
       return $X;
    
    } 

    
    public function create_by_id($id)
    {
        $team=new Team();
        $member2= $team->teamSelect()['data'];
      //  $Members_by_ID=$member->giveMembers_by_ID($p_TEAM_ID);
        $team=$team->find_by_id($id);
     //dd($team);
        if (!$team) {
            abort(404);
         }
        return view('members.add_member',compact('team','member2'));
    }

    public function save_by_id(Request $request, $id)
    {
        $request->validate([
            'ID'=>'sometimes',
            'ID_NUM' => 'required|numeric|digits:9',
            'MEM_NAME' => 'required',
            'ACTIVE' => 'required',
            'ROLE' => 'required',
            'TEAM_ID' => 'sometimes'

        ]);
     //  dd('request');

     $team=new Team();
     //dd((int)$id); 
        $id1 = (int)$id;
        $request->request->add([ 'CREATED_BY' => 1 , 'TEAM_ID'=>$id1]);
       
        $result = Team::Save_by_id(change_key($request->only($team->getFillable())));
       // dd($request->only($member->getFillable()));
        if($result['STATUS']==1){
            return back()->with('success',$result['MSG'] );

        }else {
            return back()->with('error',$result['MSG'] );
           // return redirect('study')->with('success', 'تم اضافة الدراسة بنجاح');
        }
    }
}