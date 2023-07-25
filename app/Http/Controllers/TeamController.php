<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Exports\ExportTeam;
use App\Exports\ExportTeamNum;
use Maatwebsite\Excel\Facades\Excel;

use App\Classes\StaticCode;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return Excel::download(new ExportTeam(), 'teams.xlsx');
        $html_breadcrumbs = [
            'title' => 'الفرق',
            'title_url' => route('teams.index'),
            'subtitle' => 'فهرس',
            'datatable' => true,
        ];
        $team = new Team();
        $teams_report= $team->teams_report()['data'];

        $html_new_path = '#';
        return view('teams.index',compact('html_breadcrumbs','html_new_path'));


    }

    public function datatable(Request $request)
    {
        $search = null;
        if($request->search['value'] != ""){
            $search = $request->search['value'];
        }

        \LogActivity::addToLog(StaticCode::$teams,null,StaticCode::$showall,StaticCode::$page,'عرض الفرق ');
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
        \LogActivity::addToLog(StaticCode::$teams,$result['STATUS'],StaticCode::$insert,StaticCode::$model,'اضافة فريق جديد');
           if($result['STATUS']> 1){
           return ['status'=>1,'msg'=>$result['MSG']];


        }else {

            return ['status'=>-1,'msg'=>$result['MSG']];

        }
      // return [];
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
       // dd($result);
        \LogActivity::addToLog(StaticCode::$teams,$id,StaticCode::$update,StaticCode::$model,' تعديل الفريق ');

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
        \LogActivity::addToLog(StaticCode::$teams,$id,StaticCode::$delete,StaticCode::$page,' حذف الفريق ');
        return [];
    }


    public function giveMembers($TEAM_ID)
    {

       $team=new Team();
       $X= $team->giveMembers($TEAM_ID)['data'];
    //    \LogActivity::addToLog(StaticCode::$teams,$result['STATUS'],StaticCode::$delete,StaticCode::$page,' تعديل المهمة ');

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

     $team=new Team();
        $id1 = (int)$id;
        $request->request->add([ 'CREATED_BY' => 1 , 'TEAM_ID'=>$id1]);

        $result = Team::Save_by_id(change_key($request->only($team->getFillable())));
        \LogActivity::addToLog(StaticCode::$teams,$id,StaticCode::$insert,StaticCode::$model,'اضافة عضو على الفريق  ');

        if($result['STATUS']==1){
            return back()->with('success',$result['MSG'] );

        }else {
            return back()->with('error',$result['MSG'] );
        }
    }


    public function exportTeams(Request $request)
    {
        \LogActivity::addToLog(StaticCode::$teams,null,StaticCode::$export,StaticCode::$page,' التقرير الفرق ');

        return Excel::download(new ExportTeam(), 'teams.xlsx');


           // $x = $request->isactive;
          //  return Excel::download(new ExportStudy($request->final_active,$request->title), 'studies.xlsx');

        // dd($request->isactive);
        //dd($request->all());

    }



    public function exportTeamsNum(Request $request)
    {
        \LogActivity::addToLog(StaticCode::$teams,null,StaticCode::$export,StaticCode::$page,' التقرير الفرق ');

        return Excel::download(new ExportTeamNum(), 'teams.xlsx');

    }
}
