<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('teams/create_by_id/{ID}', 'TeamController@create_by_id')->name('teams.create_by_id');
Route::post('teams/save_by_id/{ID}', 'TeamController@save_by_id')->name('teams.save_by_id');
Route::get('teams/giveMembers/{TEAM_ID}', 'TeamController@giveMembers')->name('teams.giveMembers');
Route::get('teams/datatable', 'TeamController@datatable')->name('teams.datatable');
Route::resource('teams', 'TeamController');


// Route::post('members/save_by_id/{ID}', 'MemberController@save_by_id')->name('members.save_by_id');
Route::get('members/info/{ID_NUM}', 'MemberController@info')->name('members.info');
Route::get('members/datatable', 'MemberController@datatable')->name('members.datatable');
Route::resource('members', 'MemberController');


Route::get('systems/datatable', 'SystemController@datatable')->name('systems.datatable');
Route::resource('systems', 'SystemController');


Route::post('tasks/update_reason/{ID}', 'TasksController@update_reason')->name('tasks.update_reason');
Route::get('tasks/giveMembers/{TEAM_ID}', 'TasksController@giveMembers')->name('tasks.giveMembers');
Route::get('tasks/sysName_mem/{ID_NUM}', 'TasksController@sysName_mem')->name('tasks.sysName_mem');
Route::get('tasks/datatable', 'TasksController@datatable')->name('tasks.datatable');
Route::resource('tasks', 'TasksController');

