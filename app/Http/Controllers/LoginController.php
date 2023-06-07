<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
       $user = Member::GET_BY_ID($request->id_no);
       if($user){
        session() -> put('user' ,[
            'user_id' => $user->ID,
            'ID_NUM' => $user->ID_NUM,
            'MEM_NAME' => $user->MEM_NAME,
            'TEAM_ID' => $user->TEAM_ID
        ]);
        return redirect(route('index'));
       }else{
        throw ValidationException::withMessages([
            'id_no' => 'بيانات خاطئة',
        ]);
       }
    }

    public function logout(Request $request)
    {
        session()->forget('user');
        if(!session()->has('user')) {
            return redirect(route('login'));
        }
    }
}
