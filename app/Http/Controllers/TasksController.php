<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\SystemMembers;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems= SystemMembers::get_systems_by_user_id(session('user')['user_id'])['data'];
        return view('tasks.index',compact('systems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $tasks = new Tasks();

          $systems= SystemMembers::get_systems_by_user_id(session('user')['user_id'])['data'];
          $GET_MEMBERS= $tasks->GET_MEMBERS()['data'];

          return view('tasks.form',compact('tasks','systems','GET_MEMBERS'));

    }

    public function datatable(Request $request)
    {
        $search = null;
        $search2 = null;
        $search3 = null;
        $search4 = null;
        $search5 = null;
        $tasks = new Tasks();
        $get_all_members= $tasks->get_all_members()['data'];

        if($request->search['value'] != ""){
            $search = $request->search['value'];
        }
       return json_encode(Tasks::LOAD_DATA($search,$request->ACTUAL_FINISH_MONTH,$request->ACTUAL_FINISH_YEAR,$request->MEM_ID,$request->COMPLETION_STATUS,$request->SYSTEM_ID,$request->start,$request->length));

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

           'SYSTEM_ID'=>'required',
           'DESCRIPTION'=>'sometimes',
           'priority'=>'sometimes',
           'TASK_TYPE'=>'required',
           'PLANNED_START_DT'=>'sometimes',
           'PLANNED_FINISH_DT'=>'sometimes',
           'ACTUAL_START_DT'=>'sometimes|date_format:d/m/Y',
           'ACTUAL_FINISH_DT'=>'nullable|date_format:d/m/Y|after_or_equal:PLANNED_START_DT',
           'COMPLETION_PERIOD'=>'sometimes',
           'COMPLETION_STATUS'=>'sometimes',
           'NOTES'=>'sometimes',
           'IN_PLAN'=>'required',
           'TITLE'=>'sometimes',
           'DURATION_TYPE'=>'sometimes',
           'MEM_ID' =>'required'


        ]);

     $tasks = new Tasks();
     $request->request->add(['CREATED_BY' => 1]);
     $result = Tasks::Save_(change_key($request->only($tasks->getFillable())));
       // return back()->with('success', 'تمت عملية الحفظ بنجاح');
       if($result['STATUS']==1){
        return back()->with('success',$result['MSG'] );
    }else {
        return back()->with('error',$result['MSG'] );
       // return redirect('study')->with('success', 'تم اضافة الدراسة بنجاح');
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
        $tasks = new Tasks();
        $systems= SystemMembers::get_systems_by_user_id(session('user')['user_id'])['data'];
        // $member2= $tasks->teamSelect()['data'];
        $tasks  = $tasks->find_by_id($id);
        if (!$tasks) {
            abort(404);
        }
        $GET_MEMBERS = SystemMembers::get_systems_by_id($tasks->SYSTEM_ID)['data'];
        return view('tasks.form',compact('tasks','systems','GET_MEMBERS'));
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
           'SYSTEM_ID'=>'required',
           'DESCRIPTION'=>'sometimes',
           'priority'=>'sometimes',
           'TASK_TYPE'=>'required',
           'PLANNED_START_DT'=>'sometimes',
           'PLANNED_FINISH_DT'=>'sometimes',
           'ACTUAL_START_DT'=>'sometimes',
           'ACTUAL_FINISH_DT'=>'nullable|date_format:d/m/Y|after_or_equal:PLANNED_START_DT',
           'COMPLETION_PERIOD'=>'sometimes',
           'COMPLETION_STATUS'=>'sometimes',
           'NOTES'=>'sometimes',
           'IN_PLAN'=>'required',
           'TITLE'=>'sometimes',
           'DURATION_TYPE'=>'sometimes',
           'MEM_ID' =>'required'


        ]);


        $tasks = new Tasks();
        $tasks = $tasks->find_by_id($id);
        if (!$tasks) {
            abort(404);
        }

        $request->request->add(['UPDATED_BY' => 1,'ID'=>$id]);
        $result = Tasks::Update_(change_key($request->only((new Tasks())->getFillable())));
        if($result['STATUS']==1){
            return back()->with('success',$result['MSG'] );

        }else {
            return back()->with('error',$result['MSG'] );
           // return redirect('study')->with('success', 'تم اضافة الدراسة بنجاح');
        }
        //return back()->with('success', 'تمت عملية الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = new Tasks();
        if ($tasks->find_by_id($id)) {
            $tasks->delete_by_id($id);
        }
        return [];
    }


    public function teamSelect()
    {
       //TODO :: remove
        $tasks = new Tasks();
       $X= $tasks->teamSelect();
        echo json_decode($X);
    }


    public function giveMembers($TEAM_ID)
    {

        $tasks = new Tasks();
        $X= $tasks->giveMembers($TEAM_ID)['data'];
        return $X;

    }


    public function sysName_mem($P_NUM_ID)
    {

        $tasks = new Tasks();
        $X= $tasks->sysName_mem($P_NUM_ID)['data'];
        return $X;

    }


    public function update_reason (Request $request, $id)
    {

        $tasks = new Tasks();
        $tasks = $tasks->find_by_id($id);
        if (!$tasks) {
            abort(404);
        }

        $request->request->add(['UPDATED_BY' => 1,'ID'=>$id]);
        $result = Tasks::update_reason(change_key($request->only((new Tasks())->getFillable())));
        if($result['STATUS']==1){
            return back()->with('success',$result['MSG'] );
        }else {
            return back()->with('error',$result['MSG'] );
        }
    }

    public function change_status($P_ID,Request $request)
    {

        $tasks = new Tasks();
        $res= $tasks->change_status($P_ID,$request->COMPLETION_STATUS);
        return [];

    }





}
