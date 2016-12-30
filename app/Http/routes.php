<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/',function(){
//    return "<h1>Base Route</h>"; 
//});
//


Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/visitor-export-pdf', 'VisitorController@export_visitor_pdf');

    Route::auth();
    // visitor routes
    Route::get('/visitor','VisitorController@getvisitor');
    Route::get('/visitor-export-excel','VisitorController@export_visitor');
    Route::post('/add_visitor','VisitorController@add_visitor');
    Route::get('/visitor_in_json','VisitorController@getvisitor_in_json');
    Route::post('/remove_visitor','VisitorController@remove_visitor');
    // end of visitor routes
    // student routes
    Route::get('/student','StudentController@getstudents');
    //Route::get('/student_in_json','StudentController@getstudent_in_json');
    Route::post('/add_student','StudentController@add_student');
    Route::post('/remove_student','StudentController@remove_student');
    Route::get('/student_in_json','StudentController@getstudent_in_json');
    Route::get('/student_education_in_json','StudentController@getstudent_edu_in_json');
    Route::get('/student_pre_major_subjects_in_json','StudentController@getstudent_pre_major_subjects_in_json');
    Route::get('/student_langauage_ratings_in_json','StudentController@student_langauage_ratings_in_json');
    Route::get('/student-pdf-form/{id}','StudentController@student_form_in_pdf');
    // end of student routes
    
    // department routes
    Route::get('/department','DepartmentController@index');
    Route::post('/add_department','DepartmentController@add_department');
    Route::post('/remove_department','DepartmentController@remove_department');
    Route::get('/department_in_json','DepartmentController@department_in_json');
    Route::get('/all_departments_in_json','DepartmentController@all_department_in_json');
    // end of department routes
    
    // program routes
    Route::get('/program','ProgramOfferedController@index');
    Route::post('/add_program','ProgramOfferedController@add_program');
    Route::post('/remove_program','ProgramOfferedController@remove_program');
    Route::get('/program_in_json','ProgramOfferedController@program_in_json');
    Route::get('/all_programs_in_json','ProgramOfferedController@all_programs_in_json');
    // end of program routes
    
    
    Route::get('/bear','bearController@getbear');
    Route::get('/picnic','bearController@getpicnic');
    Route::get('/fish','bearController@getfish');
    Route::get('/tree','bearController@gettree');
    Route::post('/submit','bearController@add_bear');
});


Route::auth();


Route::group(['middleware' => ['auth']], function() {


	Route::get('/home', 'HomeController@index');


	Route::resource('users','UserController');


	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);

	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);

	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);

	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);

	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);

	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);

	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);


	Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);

	Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);

	Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);

	Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);

	Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);

	Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);

	Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);

});
//Route::auth();
//
//Route::get('/', 'HomeController@index');
//Route::get('/bear','bearController@getbear');