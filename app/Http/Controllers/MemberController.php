<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Classes\Http;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $member = new Member();
          $member2= $member->teamSelect()['data'];

          return view('members.form',compact('member','member2'));
        
    }

    public function datatable(Request $request)
    {
        $search = null;
        if($request->search['value'] != ""){
            $search = $request->search['value'];
        }
       return json_encode(Member::LOAD_DATA($search,0,10));
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
            'ID_NUM' => 'required|numeric|digits:9',
            'MEM_NAME' => 'required',
            'ACTIVE' => 'required',
            'ROLE' => 'required',
            'TEAM_ID' => 'required'

        ]);
     //  dd('request');

        $member = new Member();
        $request->request->add(['CREATED_BY' => 1]);
        $result = Member::Save_(change_key($request->only($member->getFillable())));
        if($result['STATUS']==1){
            return back()->with('success',$result['MSG'] );

        }else {
            return back()->with('error',$result['MSG'] );
           // return redirect('study')->with('success', 'تم اضافة الدراسة بنجاح');
        }
     /*   header('Content-Type: application/json');
        echo json_encode($result);*/
        

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





    // public function save_by_id(Request $request, $id)
    // {
    //     $request->validate([
    //         'ID'=>'sometimes',
    //         'ID_NUM' => 'required|numeric|digits:9',
    //         'MEM_NAME' => 'required',
    //         'ACTIVE' => 'required',
    //         'ROLE' => 'required',
    //         'TEAM_ID' => 'required'

    //     ]);
    //  //  dd('request');

    //     $member = new Member();
    //     //dd((int)$id); 
    //     $id1 = (int)$id;
    //     $request->request->add([ 'CREATED_BY' => 1 , 'TEAM_ID'=>$id1]);
       
    //     $result = Member::Save_by_id(change_key($request->only($member->getFillable())));
    //    // dd($request->only($member->getFillable()));
    //     if($result['STATUS']==1){
    //         return back()->with('success',$result['MSG'] );

    //     }else {
    //         return back()->with('error',$result['MSG'] );
    //        // return redirect('study')->with('success', 'تم اضافة الدراسة بنجاح');
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $member = new Member();
        $member2= $member->teamSelect()['data'];
        $member  = $member->find_by_id($id);
        if (!$member) {
            abort(404);
        }
        return view('members.form',compact('member','member2'));
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
            'ID_NUM' => 'required',
            'MEM_NAME' => 'required',
            'ACTIVE' => 'sometimes',
            'ROLE' => 'sometimes',
            'TEAM_ID' => 'sometimes'
        ]);
       

        $member = new Member();
        $member = $member->find_by_id($id);
        if (!$member) {
            abort(404);
        }
      
        $request->request->add(['UPDATED_BY' => 1,'ID'=>$id]);
        $result = Member::Update_(change_key($request->only((new Member())->getFillable())));
      
       // return back()->with('success', 'تمت عملية الحفظ بنجاح');

       if($result['STATUS']==1){
        return back()->with('success',$result['MSG'] );

    }else {
        return back()->with('error',$result['MSG'] );
       // return redirect('study')->with('success', 'تم اضافة الدراسة بنجاح');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = new Member();
        if ($member->find_by_id($id)) {
            $member->delete_by_id($id);
        }
        return [];
    }



    public function teamSelect()
    {
       
       $member = new Member();
       $X= $member->teamSelect();
        echo json_decode($X);
    }
    public function info($ID_NUM)
    {
        $headers = array_merge(
            [
                "Authorization: Bearer xfE26R56eNZXtn0cV0f8WE1kHECDyORgn3sf4vm4CPCWcPbN7n5WsmdgN7xDZvu6lYA4uId4tg4H43SHPzSck4ob9gg0qz6rP2lJOcraB2ZP3t1P3Q1FAtYlelyVZU6E4uxebNCFthprqPFyHCSSaEYkMWh48qI84em5HnsD0xZJfrjsJzXuNuKibb4oj_QVUbySITFx0vR5cNAekdXbKGQEN5U15l_oNQf-XXh2cDsVtjplNK9V9UU_TMX83J9iT-aW6eSxr4HLtjROGHPsRy-xQlyHvNDRUWHQpeNdIst_LcRJmFxeEAbWd6BUfF4PwC-yKHPuQGgMbe07ml3CTDOV4yHyE4eQt69deETTpx9lqidBKkOVyr1aPG-8JBvQ",
            ],
            []
        );
        $params=[];
        $response = Http::request("GET", "https://api.moi.gov.ps/WebApp/Ctzn/info/$ID_NUM", $params,  ['headers' => $headers])->call();
        if(isset($response->result)){
            return $response->result;
        }
        return ['status'=>-1];
    }



    public function memberTeamSelect($P_member_id)
    {
       
       $member = new Member();
       $X= $member->memberTeamSelect(80456574);
        echo json_decode($X);

    
    }  
    
}
