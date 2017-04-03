<?php

Route::group(['middleware' => 'web', 'prefix' => 'login', 'namespace' => 'Modules\Login\Http\Controllers'], function()
{
    Route::get('/',array(
        'as'=>'login',
        'uses'=>'LoginController@index'
    ));
	Route::post('login',array(
            'as'=>'login.login',
            'uses'=>'LoginController@login'
        ));
});