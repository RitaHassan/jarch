<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;
use App\Models\Member;
use App\Models\SystemMembers;
use App\Exports\ExportSystem;
use App\Exports\ExportSystemNum;
use App\Exports\ExportAll;
use Maatwebsite\Excel\Facades\Excel;
use App\Classes\StaticCode;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $html_breadcrumbs = [
            'title' => 'الأنظمة',
            'title_url' => route('systems.index'),
            'subtitle' => 'فهرس',
            'datatable' => true,
        ];
        $html_new_path = '#';
        $members = Member::LOAD_DATA(null,0,100)['data'];

        return view('systems.index',compact('html_breadcrumbs','html_new_path','members'));
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
       $search2 = null;
        if($request->search['value'] != ""){
            $search = $request->search['value'];
        }
        \LogActivity::addToLog(StaticCode::$systems,null,StaticCode::$showall,StaticCode::$page,'  عرض الاعضاء ');

        // // dd(System::LOAD_DATA($search,0,10,$request->ACTIVE));
       return json_encode(System::LOAD_DATA($search,0,10,$request->ACTIVE));
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
     $system = new System();
     $request->request->add(['CREATED_BY' => 1]);
     $result = System::Save_(change_key($request->only($system->getFillable())));
     \LogActivity::addToLog(StaticCode::$systems,$result['STATUS'],StaticCode::$insert,StaticCode::$model,' اضافة نظام');
//dd($result);
if($result['STATUS']> 1){
    //dd($result['STATUS']);
    return ['status'=>1,'msg'=>$result['MSG']];


 }else {
   // dd('kkk');

     return ['status'=>-1,'msg'=>$result['MSG']];

 }
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
        \LogActivity::addToLog(StaticCode::$systems,$id,StaticCode::$update,StaticCode::$model,' تعديل النظام ');

        return [];
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
        \LogActivity::addToLog(StaticCode::$systems,$id,StaticCode::$delete,StaticCode::$page,' حذف النظام ');

        return [];
    }

    public function toggel($id){
        System::TOGGEL($id);
        return [];
    }

    public function add_members(Request $request)
    {
        $request->validate([
            'SYSTEM_ID' => 'required',
            'MEMBER_ID' => 'required'
        ]);
        $SystemMembers = new SystemMembers();
        $request->request->add(['CREATED_BY' => 1]);
        $result = SystemMembers::Save_(change_key($request->only($SystemMembers->getFillable())));

        \LogActivity::addToLog(StaticCode::$system_members,$result['STATUS'],StaticCode::$insert,StaticCode::$model,'  اضافة الاعضاء للنظام ');

        if($result['STATUS']>1){
            return ['status'=>1];

         }else {
             return ['status'=>-1,'msg'=>$result['MSG']];

         }
    }

    public function members($id)
    {
        $members = SystemMembers::get_systems_by_id($id)['data'];
        return $members;
    }

    public function delete_member($id)
    {
        $member = new SystemMembers();
        if ($member->find_by_id($id)) {
            $member->delete_by_id($id);
        }
        \LogActivity::addToLog(StaticCode::$system_members,$id,StaticCode::$delete,StaticCode::$page,' حذف اعضاء الفريق ');

        return [];
    }

    public function get_by_user_id($user_id)
    {
       $data = SystemMembers::get_systems_by_user_id($user_id);
       return $data['data'];
    }


    public function systems($member_id)
    {
       $data = System::systems($member_id);
       return $data['data'];
    }

    public function exportSystems(Request $request)
    {
        \LogActivity::addToLog(StaticCode::$systems,null,StaticCode::$export,StaticCode::$page,'  التقرير الانظمة ');

        return Excel::download(new ExportSystem($request->ACTIVE), 'Systems.xlsx');
    }



    public function exportAll(Request $request)
    {
        \LogActivity::addToLog(StaticCode::$systems,null,StaticCode::$export,StaticCode::$page,' التقرير الانظمة ');

        return Excel::download(new ExportAll(), 'Systems.xlsx');
    }

    public function exportSystemNum(Request $request)
    {
        \LogActivity::addToLog(StaticCode::$systems,null,StaticCode::$export,StaticCode::$page,' التقرير الانظمة ');

        return Excel::download(new ExportSystemNum(), 'Systems.xlsx');
    }
}
