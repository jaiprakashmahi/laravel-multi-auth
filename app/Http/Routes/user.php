<?php

Route::group(['middleware' => ['auth:users']], function ($router) {
    Route::get('/', [
        'uses' => 'UserController@index',
        'as' => 'users.index',
    ]);
});

Route::get('login', [
    'uses' => 'AuthController@index',
    'as' => 'users.auth.index',
]);

Route::post('login', [
    'uses' => 'AuthController@login',
    'as' => 'users.auth.login',
]);

Route::get('logout', [
    'uses' => 'AuthController@logout',
    'as' => 'users.auth.logout',
]);

Route::get('register', [
    'uses' => 'AuthController@getRegister',
    'as' => 'users.auth.register',
]);

Route::post('register', [
    'uses' => 'AuthController@postRegister',
    'as' => 'users.auth.register',
]);

Route::get('password/reset/{token?}', [
    'uses' => 'PasswordController@showResetForm',
    'as' => 'users.password.reset',
]);

Route::post('password/reset', [
    'uses' => 'PasswordController@reset',
    'as' => 'users.password.reset',
]);

Route::post('password/email', [
    'uses' => 'PasswordController@sendResetLinkEmail',
    'as' => 'users.password.email',
]);


Route::resource('work','WorkController');

Route::get('/work/remove/{id}',['middleware' => 'auth:users','as'=>'user.work.remove','uses'=>'WorkController@remove']);

//fund status route

Route::get('/work/partial/{status}',['middleware' => 'auth:users','as'=>'user.work.partial','uses'=>'WorkController@Partial']);
Route::get('/work/full/{status}',['middleware' => 'auth:users','as'=>'user.work.full','uses'=>'WorkController@Full']);


Route::resource('progress','ProgressController');

Route::resource('work_assign','WorkAssignController');

Route::resource('work_agency','WorkAgencyController');

Route::get('/work_agency/AgencyPartial/{status}',['middleware' => 'auth:users','as'=>'user.work_agency.AgencyPartial','uses'=>'WorkAgencyController@AgencyPartial']);
Route::get('/work_agency/AgencyFull/{status}',['middleware' => 'auth:users','as'=>'user.work_agency.AgencyFull','uses'=>'WorkAgencyController@AgencyFull']);
Route::get('/work_agency/AgencyProgress/{status}',['middleware' => 'auth:users','as'=>'user.work_agency.AgencyProgress','uses'=>'WorkAgencyController@AgencyProgress']);
Route::get('/work_agency/work_close/{id}',['middleware'=>'auth:users','as'=>'user.work_agency.work_close','uses'=>'WorkAgencyController@WorkClose']);
Route::get('/work_agency/WorkComplete/{status}',['middleware' => 'auth:users','as'=>'user.work_agency.WorkComplete','uses'=>'WorkAgencyController@WorkComplete']);
Route::get('/work_agency/remove/{id}',['middleware'=>'auth:users','as'=>'user.work_agency.remove','uses'=>'WorkAgencyController@remove']);

Route::resource('work_image','WorkImageController');

Route::resource('agency_expenses','AgencyExpenseController');
Route::get('/agency_expenses/remove/{id}',['middleware'=>'auth:users','as'=>'user.agency_expenses.remove','uses'=>'AgencyExpenseController@remove']);

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

Route::get('work/village/{taluka_id}', function($taluka_id){

   $village= DB::table('villages')
           ->select('name','id')
          ->where('status', '=', 1)
           ->where('taluka_id','=',$taluka_id)->get();
    return $village;

});