<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Middleware\CheckLogin;
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
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');
Route::middleware([CheckLogin::class])->group(function () {

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('teams/create_by_id/{ID}', 'TeamController@create_by_id')->name('teams.create_by_id');
Route::post('teams/save_by_id/{ID}', 'TeamController@save_by_id')->name('teams.save_by_id');
Route::get('teams/giveMembers/{TEAM_ID}', 'TeamController@giveMembers')->name('teams.giveMembers');
Route::get('teams/datatable', 'TeamController@datatable')->name('teams.datatable');
Route::get('teams/exportTeams', 'TeamController@exportTeams')->name('teams.exportTeams');

Route::resource('teams', 'TeamController');


// Route::post('members/save_by_id/{ID}', 'MemberController@save_by_id')->name('members.save_by_id');
Route::get('members/info/{ID_NUM}', 'MemberController@info')->name('members.info');
Route::get('members/datatable', 'MemberController@datatable')->name('members.datatable');
Route::resource('members', 'MemberController');


Route::get('systems/datatable', 'SystemController@datatable')->name('systems.datatable');
Route::get('systems/toggel/{id}', 'SystemController@toggel')->name('systems.toggel');
Route::post('systems/members', 'SystemController@add_members')->name('systems.members.store');
Route::get('systems/members/{id}', 'SystemController@members')->name('systems.members.delete');
Route::delete('systems/members/{id}', 'SystemController@delete_member')->name('systems.members');
Route::get('systems/get_by_user_id/{user_id}', 'SystemController@get_by_user_id')->name('systems.get_by_user_id');
Route::get('systems/exportSystems', 'SystemController@exportSystems')->name('systems.exportSystems');
Route::resource('systems', 'SystemController');



Route::get('tasks/change_status/{id}', 'TasksController@change_status')->name('tasks.change_status');
Route::get('tasks/change_status_2/{id}', 'TasksController@change_status_2')->name('tasks.change_status_2');
Route::post('tasks/update_reason/{ID}', 'TasksController@update_reason')->name('tasks.update_reason');
Route::get('tasks/giveMembers/{TEAM_ID}', 'TasksController@giveMembers')->name('tasks.giveMembers');
Route::get('tasks/sysName_mem/{ID_NUM}', 'TasksController@sysName_mem')->name('tasks.sysName_mem');
Route::get('tasks/MyTasks', 'TasksController@MyTasks')->name('tasks.MyTasks');
Route::get('tasks/GetMyTask', 'TasksController@GetMyTask')->name('tasks.GetMyTask');
Route::get('tasks/datatable', 'TasksController@datatable')->name('tasks.datatable');
Route::get('tasks/export', 'TasksController@export')->name('tasks.export');
Route::resource('tasks', 'TasksController');



});
