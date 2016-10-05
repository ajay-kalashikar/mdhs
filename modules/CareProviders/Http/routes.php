<?php

Route::group(['prefix' => 'careproviders', 'namespace' => 'Modules\CareProviders\Http\Controllers'], function()
{
    Route::get('get/counties', 'CareProvidersController@getCounties');
    Route::get('get/provider_types', 'CareProvidersController@getProviderTypes');
    Route::get('get/ratings', 'CareProvidersController@getRatings');
    Route::get('get/cities', 'CareProvidersController@getCities');
    Route::resource('get', 'CareProvidersController', ['except' => ['create', 'update', 'edit']]);
});
