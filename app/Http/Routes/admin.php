<?php

Route::group(['middleware' => ['auth:admin']], function ($router) {
    Route::get('/', [
        'uses' => 'AdminController@index',
        'as' => 'admin.index',
    ]);
});

Route::get('login', [
    'uses' => 'AuthController@index',
    'as' => 'admin.auth.index',
]);

Route::post('login', [
    'uses' => 'AuthController@login',
    'as' => 'admin.auth.login',
]);

Route::get('logout', [
    'uses' => 'AuthController@logout',
    'as' => 'admin.auth.logout',
]);

Route::get('register', [
    'uses' => 'AuthController@getRegister',
    'as' => 'admin.auth.register',
]);

Route::post('register', [
    'uses' => 'AuthController@postRegister',
    'as' => 'admin.auth.register',
]);

Route::get('password/reset/{token?}', [
    'uses' => 'PasswordController@showResetForm',
    'as' => 'admin.password.reset',
]);

Route::post('password/reset', [
    'uses' => 'PasswordController@reset',
    'as' => 'admin.password.reset',
]);

Route::post('password/email', [
    'uses' => 'PasswordController@sendResetLinkEmail',
    'as' => 'admin.password.email',
]);

Route::resource('alluser','AlluserController');
Route::get("/alluser/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.alluser.remove', 'uses' => 'AlluserController@remove']);


Route::get('/change/password',['middleware' => 'auth:admin', 'uses' => 'AdminController@getchangepassword'])->name('changepassword');
Route::post('/save/change/password', ['middleware' => 'auth:admin', 'uses' =>'AdminController@postchangepassword'])->name('changepassword-save');


// route for Administrators

Route::resource('administrators','AdministratorsController');
Route::get("/administrators/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.administrators.remove', 'uses' => 'AdministratorsController@remove']);


//route for financial_years

Route::resource('financial-years','FinancialYearsController');
Route::get("/financial-years/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.financial-years.remove', 'uses' => 'FinancialYearsController@remove']);

//route for officers

Route::resource('officers','OfficersController');
Route::get("/officers/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.officers.remove', 'uses' => 'OfficersController@remove']);

//Final Officer route

Route::resource('final-officer','FinalOfficerController');
Route::get('/final-officer/remove/{id}',['middleware'=>'auth:admin','as'=>'admin.final-officer.remove','uses'=>'FinalOfficerController@remove']);

//route for Plan

Route::resource('plane','PlaneController');
Route::get("/plane/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.plane.remove', 'uses' => 'PlaneController@remove']);

// route scheme

Route::resource('schemes','SchemesController');
Route::get("/schemes/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.schemes.remove', 'uses' => 'SchemesController@remove']);


//route for sector

Route::resource('sector','SectorController');
Route::get("/sector/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.sector.remove', 'uses' => 'SectorController@remove']);


//route for sub-sector

Route::resource('sub-sector','SubSectorController');
Route::get("/sub-sector/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.sub-sector.remove', 'uses' => 'SubSectorController@remove']);


//route for talukas

Route::resource('talukas','TalukasController');
Route::get("/talukas/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.talukas.remove', 'uses' => 'TalukasController@remove']);


//route for village

Route::resource('village','VillageController');
Route::get("/village/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.village.remove', 'uses' => 'VillageController@remove']);


//route for work type

Route::resource('work-type','workTypeController');
Route::get("/work-type/remove/{id}", ['middleware' =>'auth:admin','as' => 'admin.work-type.remove', 'uses' => 'workTypeController@remove']);


//All Ajax work route

Route::get("work/sector/{plane_id}",function($plane_id){

    return DB::table('sectors')
        ->select('name', 'id')
        ->where('plane_id', '=', $plane_id)
        ->where('status', '=', 1)
        ->get();
});

Route::get("work/sub_sector/{sector_id}", function($sector_id){
    $sub_sectors= DB::table('subsectors')
        ->select('name','id')
        ->where('sector_id','=',$sector_id)
        ->where('status', '=', 1)
        ->get();
    return $sub_sectors;
});
Route::get("work/scheme/{sub_sector_id}", function($sub_sector_id){

    $scheme= DB::table('schemes')
        ->select('name','id')
        ->where('status', '=', 1)
        ->where('sub_sector_id','=',$sub_sector_id)->get();
    return $scheme;
});