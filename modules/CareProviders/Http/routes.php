<?php

Route::group(['prefix' => 'careproviders', 'namespace' => 'Modules\CareProviders\Http\Controllers'], function()
{
//    Route::get('/', 'CareProvidersController@index');
    Route::resource('api', 'CareProvidersController', ['except' => ['create', 'update', 'edit']]);
});
