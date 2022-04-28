<?php

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

//Login
Route::get('/','LoginnController@GetLogin')->middleware('CheckLogout');
Route::post('/','LoginnController@PostLogin');

//Admin
Route::group(['prefix'=>'admin','middleware'=>'CheckLogin'],function()
{
    Route::get('','AdminController@Admin');
    Route::get('logout','AdminController@Logout');

//Bonus
Route::get('list-bonus','BonusController@GetListBonus');

Route::get('add-bonus','BonusController@GetAddBonus');
Route::post('add-bonus','BonusController@PostAddBonus');

Route::get('edit-bonus/{ordinal_id}','BonusController@GetEditBonus');
Route::post('edit-bonus/{ordinal_id}','BonusController@PostEditBonus');

Route::get('delete-bonus/{ordinal_id}','BonusController@DeleteBonus');


//BonusDetail
Route::get('list-bonus-detail','BonusDetailController@GetListBonusDetail');

Route::get('add-bonus-detail','BonusDetailController@GetAddBonusDetail');
Route::post('add-bonus-detail','BonusDetailController@PostAddBonusDetail');

Route::get('edit-bonus-detail/{bonus_id}','BonusDetailController@GetEditBonusDetail');
Route::post('edit-bonus-detail/{bonus_id}','BonusDetailController@PostEditBonusDetail');

Route::get('delete-bonus-detail/{bonus_id}','BonusDetailController@DeleteBonusDetail');


//Contract
Route::get('list-contract','ContractController@GetListContract');

Route::get('add-contract','ContractController@GetAddContract');
Route::post('add-contract','ContractController@PostAddContract');

Route::get('edit-contract/{contract_id}','ContractController@GetEditContract');
Route::post('edit-contract/{contract_id}','ContractController@PostEditContract');

Route::get('delete-contract/{contract_id}','ContractController@DeleteContract');



//Departments
Route::get('list-departments','DepartmentsController@GetListDepartments');
Route::post('add-departments','DepartmentsController@PostAddDepartments');
Route::get('add-departments','DepartmentsController@GetAddDepartments');

Route::get('edit-departments/{department_id}','DepartmentsController@GetEditDepartments');
Route::post('edit-departments/{department_id}','DepartmentsController@PostEditDepartments');

Route::get('delete-departments/{department_id}','DepartmentsController@DeleteDepartments');
//Employee
Route::get('list-employee','EmployeeController@GetListEmployee');

Route::get('add-employee','EmployeeController@GetAddEmployee');
Route::post('add-employee','EmployeeController@PostAddEmployee');

Route::get('edit-employee/{employee_id}','EmployeeController@GetEditEmployee');
Route::post('edit-employee/{employee_id}','EmployeeController@PostEditEmployee');

Route::get('delete-employee/{employee_id}','EmployeeController@DeleteEmployee');



//Fine
Route::get('list-fine','FineController@GetListFine');

Route::get('add-fine','FineController@GetAddFine');
Route::post('add-fine','FineController@PostAddFine');

Route::get('edit-fine/{ordinal_id}','FineController@GetEditFine');
Route::post('edit-fine/{ordinal_id}','FineController@PostEditFine');

Route::get('delete-fine/{ordinal_id}','FineController@DeleteFine');

//FineDetail
Route::get('list-fine-detail','FineDetailController@GetListFineDetail');

Route::get('add-fine-detail','FineDetailController@GetAddFineDetail');
Route::post('add-fine-detail','FineDetailController@PostAddFineDetail');

Route::get('edit-fine-detail/{fine_id}','FineDetailController@GetEditFineDetail');
Route::post('edit-fine-detail/{fine_id}','FineDetailController@PostEditFineDetail');

Route::get('delete-fine-detail/{fine_id}','FineDetailController@DeleteFineDetail');

//Level
Route::get('list-level','LevelController@GetListLevel');

Route::get('add-level','LevelController@GetAddLevel');
Route::post('add-level','LevelController@PostAddLevel');

Route::get('edit-level/{level_id}','LevelController@GetEditLevel');
Route::post('edit-level/{level_id}','LevelController@PostEditLevel');

Route::get('delete-level/{level_id}','LevelController@DeleteLevel');


//Position
Route::get('list-position','PositionController@GetListPosition');

Route::get('add-position','PositionController@GetAddPosition');
Route::post('add-position','PositionController@PostAddPosition');

Route::get('edit-position/{position_id}','PositionController@GetEditPosition');
Route::post('edit-position/{position_id}','PositionController@PostEditPosition');

Route::get('delete-position/{position_id}','PositionController@DeletePosition');


//Salary
Route::get('list-salary','SalaryController@GetListSalary');
Route::get('list-salary-department','SalaryController@GetAddSalary');


//WorkDay
Route::get('list-work-day','WorkDayController@GetListWorkDay');
Route::post('list-work-day','WorkDayController@PostListWorkDay');

Route::get('add-work-day','WorkDayController@GetAddWorkDay');
Route::post('add-work-day','WorkDayController@PostAddWorkDay');

Route::get('edit-work-day/{ordinal_id}','WorkDayController@GetEditWorkDay');
Route::post('edit-work-day/{ordinal_id}','WorkDayController@PostEditWorkDay');

Route::get('delete-work-day/{ordinal_id}','WorkDayController@DeleteWorkDay');

});









